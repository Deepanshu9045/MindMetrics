<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\TestAttempt;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MindMetricsController extends Controller
{
    public function home(): View
    {
        $meta = $this->testMeta();

        foreach ($meta as $type => $item) {
            $questionCount = Question::where('type', $type)->count();
            $maxScore = (int) Question::where('type', $type)->sum('max_points');

            $meta[$type]['question_count'] = $questionCount;
            $meta[$type]['max_score'] = $maxScore;
        }

        return view('home', [
            'tests' => $meta,
        ]);
    }

    public function show(string $type): View
    {
        $questions = Question::where('type', $type)->orderBy('id')->get();

        abort_if($questions->isEmpty(), 404);

        return view('test', [
            'type' => $type,
            'meta' => $this->testMeta($type),
            'questions' => $questions,
        ]);
    }

    public function submit(Request $request, string $type): RedirectResponse
    {
        $questions = Question::where('type', $type)->orderBy('id')->get();

        abort_if($questions->isEmpty(), 404);

        $request->validate([
            'participant_name' => ['nullable', 'string', 'max:100'],
            'answers' => ['required', 'array'],
        ]);

        $answers = $request->input('answers', []);

        foreach ($questions as $question) {
            if (! array_key_exists($question->id, $answers)) {
                return back()
                    ->withErrors(['answers' => 'Please answer all questions before submitting the test.'])
                    ->withInput();
            }
        }

        $score = 0;
        $maxScore = (int) $questions->sum('max_points');

        foreach ($questions as $question) {
            $selectedKey = (string) ($answers[$question->id] ?? '');

            if ($type === 'iq') {
                if ($selectedKey === $question->correct_option) {
                    $score += (int) $question->max_points;
                }

                continue;
            }

            $matchedOption = collect($question->options)->firstWhere('key', $selectedKey);
            $score += (int) ($matchedOption['value'] ?? 0);
        }

        $percentage = $maxScore > 0
            ? round(($score / $maxScore) * 100, 2)
            : 0;

        $interpretation = $this->interpretScore($type, $score, $maxScore);

        $attempt = TestAttempt::create([
            'participant_name' => $request->string('participant_name')->toString() ?: 'Guest User',
            'type' => $type,
            'answers' => $answers,
            'score' => $score,
            'max_score' => $maxScore,
            'percentage' => $percentage,
            'interpretation' => $interpretation,
        ]);

        return redirect()->route('tests.result', $attempt);
    }

    public function result(TestAttempt $attempt): View
    {
        $meta = $this->testMeta($attempt->type);

        return view('result', [
            'attempt' => $attempt,
            'meta' => $meta,
        ]);
    }

    private function testMeta(?string $type = null): array
    {
        $meta = [
            'iq' => [
                'title' => 'IQ Test',
                'full_title' => 'IQ (Intelligence Quotient)',
                'description' => 'Objective multiple-choice questions based on logic, patterns, arithmetic, and reasoning.',
                'score_note' => 'Each correct answer gives 1 point.',
                'badge' => 'Objective Test',
            ],
            'eq' => [
                'title' => 'EQ Test',
                'full_title' => 'EQ (Emotional Quotient)',
                'description' => 'Self-assessment questions focused on emotional awareness, empathy, self-control, and communication.',
                'score_note' => 'Each answer carries 1 to 4 points.',
                'badge' => 'Self Assessment',
            ],
            'sq' => [
                'title' => 'SQ Test',
                'full_title' => 'SQ (Spiritual / Social Quotient)',
                'description' => 'Self-assessment questions about values, meaning, empathy, community thinking, and social responsibility.',
                'score_note' => 'Each answer carries 1 to 4 points.',
                'badge' => 'Self Assessment',
            ],
        ];

        return $type ? $meta[$type] : $meta;
    }

    private function interpretScore(string $type, int $score, int $maxScore): string
    {
        $percentage = $maxScore > 0 ? ($score / $maxScore) * 100 : 0;

        return match ($type) {
            'iq' => match (true) {
                $score >= 14 => 'Excellent analytical performance',
                $score >= 11 => 'Strong reasoning ability',
                $score >= 6 => 'Average reasoning ability',
                default => 'Foundational reasoning ability — more practice can improve accuracy',
            },
            'eq' => match (true) {
                $percentage >= 90 => 'Outstanding emotional awareness and balance',
                $percentage >= 75 => 'Strong emotional intelligence',
                $percentage >= 50 => 'Balanced emotional intelligence with room to improve',
                default => 'Developing emotional intelligence — practice self-awareness and empathy',
            },
            'sq' => match (true) {
                $percentage >= 90 => 'Outstanding social/spiritual awareness and value alignment',
                $percentage >= 75 => 'Strong social/spiritual quotient',
                $percentage >= 50 => 'Balanced social/spiritual understanding with growth potential',
                default => 'Developing social/spiritual quotient — reflect more on values and relationships',
            },
            default => 'Score unavailable',
        };
    }
}
