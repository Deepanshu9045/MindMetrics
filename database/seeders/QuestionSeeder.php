<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        Question::query()->delete();

        $scaleOptions = [
            ['key' => 'A', 'text' => 'Always', 'value' => 4],
            ['key' => 'B', 'text' => 'Often', 'value' => 3],
            ['key' => 'C', 'text' => 'Sometimes', 'value' => 2],
            ['key' => 'D', 'text' => 'Rarely', 'value' => 1],
        ];

        $iqQuestions = [
            [
                'prompt' => 'What comes next in the sequence: 2, 4, 8, 16, ?',
                'options' => [
                    ['key' => 'A', 'text' => '20'],
                    ['key' => 'B', 'text' => '24'],
                    ['key' => 'C', 'text' => '32'],
                    ['key' => 'D', 'text' => '34'],
                ],
                'correct_option' => 'C',
            ],
            [
                'prompt' => 'Which one is the odd one out?',
                'options' => [
                    ['key' => 'A', 'text' => 'Triangle'],
                    ['key' => 'B', 'text' => 'Square'],
                    ['key' => 'C', 'text' => 'Rectangle'],
                    ['key' => 'D', 'text' => 'Banana'],
                ],
                'correct_option' => 'D',
            ],
            [
                'prompt' => 'If all pens are tools, which statement must be true?',
                'options' => [
                    ['key' => 'A', 'text' => 'All tools are pens'],
                    ['key' => 'B', 'text' => 'Some tools are pens'],
                    ['key' => 'C', 'text' => 'No pen is a tool'],
                    ['key' => 'D', 'text' => 'All pens are made of metal'],
                ],
                'correct_option' => 'B',
            ],
            [
                'prompt' => 'What is 36 ÷ 6 + 7?',
                'options' => [
                    ['key' => 'A', 'text' => '11'],
                    ['key' => 'B', 'text' => '12'],
                    ['key' => 'C', 'text' => '13'],
                    ['key' => 'D', 'text' => '14'],
                ],
                'correct_option' => 'C',
            ],
            [
                'prompt' => 'Complete the pattern: C, F, I, L, ?',
                'options' => [
                    ['key' => 'A', 'text' => 'N'],
                    ['key' => 'B', 'text' => 'O'],
                    ['key' => 'C', 'text' => 'P'],
                    ['key' => 'D', 'text' => 'Q'],
                ],
                'correct_option' => 'B',
            ],
            [
                'prompt' => 'A car travels 150 km in 3 hours. What is its average speed?',
                'options' => [
                    ['key' => 'A', 'text' => '40 km/h'],
                    ['key' => 'B', 'text' => '45 km/h'],
                    ['key' => 'C', 'text' => '50 km/h'],
                    ['key' => 'D', 'text' => '60 km/h'],
                ],
                'correct_option' => 'C',
            ],
            [
                'prompt' => 'Which number is the smallest?',
                'options' => [
                    ['key' => 'A', 'text' => '0.08'],
                    ['key' => 'B', 'text' => '0.8'],
                    ['key' => 'C', 'text' => '0.18'],
                    ['key' => 'D', 'text' => '0.108'],
                ],
                'correct_option' => 'A',
            ],
            [
                'prompt' => 'If 5 workers finish a task in 10 days, how many worker-days are required in total?',
                'options' => [
                    ['key' => 'A', 'text' => '15'],
                    ['key' => 'B', 'text' => '25'],
                    ['key' => 'C', 'text' => '50'],
                    ['key' => 'D', 'text' => '60'],
                ],
                'correct_option' => 'C',
            ],
            [
                'prompt' => 'Which figure does not belong?',
                'options' => [
                    ['key' => 'A', 'text' => 'Sphere'],
                    ['key' => 'B', 'text' => 'Cube'],
                    ['key' => 'C', 'text' => 'Cylinder'],
                    ['key' => 'D', 'text' => 'Circle'],
                ],
                'correct_option' => 'D',
            ],
            [
                'prompt' => 'If A = 1, B = 2, C = 3 ... then what is the total value of CAT?',
                'options' => [
                    ['key' => 'A', 'text' => '20'],
                    ['key' => 'B', 'text' => '24'],
                    ['key' => 'C', 'text' => '27'],
                    ['key' => 'D', 'text' => '29'],
                ],
                'correct_option' => 'B',
            ],
            [
                'prompt' => 'What is 15% of 200?',
                'options' => [
                    ['key' => 'A', 'text' => '20'],
                    ['key' => 'B', 'text' => '25'],
                    ['key' => 'C', 'text' => '30'],
                    ['key' => 'D', 'text' => '35'],
                ],
                'correct_option' => 'C',
            ],
            [
                'prompt' => 'Find the missing number: 3, 6, 11, 18, ?',
                'options' => [
                    ['key' => 'A', 'text' => '25'],
                    ['key' => 'B', 'text' => '26'],
                    ['key' => 'C', 'text' => '27'],
                    ['key' => 'D', 'text' => '28'],
                ],
                'correct_option' => 'C',
            ],
            [
                'prompt' => 'If yesterday was Thursday, what day is tomorrow?',
                'options' => [
                    ['key' => 'A', 'text' => 'Friday'],
                    ['key' => 'B', 'text' => 'Saturday'],
                    ['key' => 'C', 'text' => 'Sunday'],
                    ['key' => 'D', 'text' => 'Monday'],
                ],
                'correct_option' => 'B',
            ],
            [
                'prompt' => 'A is taller than B, and B is taller than C. Who is the shortest?',
                'options' => [
                    ['key' => 'A', 'text' => 'A'],
                    ['key' => 'B', 'text' => 'B'],
                    ['key' => 'C', 'text' => 'C'],
                    ['key' => 'D', 'text' => 'Cannot be determined'],
                ],
                'correct_option' => 'C',
            ],
            [
                'prompt' => 'In a group of 25 people, 1/5 are wearing glasses. How many people wear glasses?',
                'options' => [
                    ['key' => 'A', 'text' => '4'],
                    ['key' => 'B', 'text' => '5'],
                    ['key' => 'C', 'text' => '6'],
                    ['key' => 'D', 'text' => '10'],
                ],
                'correct_option' => 'B',
            ],
        ];

        $eqQuestions = [
            'I stay calm when things do not go according to plan.',
            'I can clearly identify what I am feeling.',
            'I listen carefully before reacting in a conversation.',
            'I admit my mistakes and apologise when needed.',
            'I understand how my words can affect other people.',
            'I handle criticism without becoming too defensive.',
            'I can control my anger in stressful situations.',
            'I try to understand another person’s point of view.',
            'I stay motivated even when progress is slow.',
            'I respond thoughtfully instead of reacting instantly.',
            'I express my feelings in a healthy way.',
            'I can work well with people who have different personalities.',
            'I notice when someone around me feels upset.',
            'I stay respectful during disagreements.',
            'I can recover emotionally after a difficult day.',
        ];

        $sqQuestions = [
            'I think about how my actions affect other people.',
            'I respect people who have different beliefs or backgrounds.',
            'I try to act honestly even when no one is watching.',
            'I reflect on my values before making important decisions.',
            'I help others without always expecting something in return.',
            'I look for meaning in difficult situations.',
            'I feel connected to a bigger purpose in life.',
            'I show gratitude for the good things in my life.',
            'I try to solve conflict in a peaceful and fair way.',
            'I take responsibility for my role in the community around me.',
            'I pause before judging someone too quickly.',
            'I try to live according to my principles and values.',
            'I encourage kindness and inclusion in group settings.',
            'I spend time on self-reflection, meditation, or prayer.',
            'I try to grow as a person through my daily choices.',
        ];

        foreach ($iqQuestions as $index => $question) {
            Question::create([
                'type' => 'iq',
                'prompt' => $question['prompt'],
                'options' => $question['options'],
                'correct_option' => $question['correct_option'],
                'max_points' => 1,
                'sort_order' => $index + 1,
            ]);
        }

        foreach ($eqQuestions as $index => $prompt) {
            Question::create([
                'type' => 'eq',
                'prompt' => $prompt,
                'options' => $scaleOptions,
                'correct_option' => null,
                'max_points' => 4,
                'sort_order' => $index + 1,
            ]);
        }

        foreach ($sqQuestions as $index => $prompt) {
            Question::create([
                'type' => 'sq',
                'prompt' => $prompt,
                'options' => $scaleOptions,
                'correct_option' => null,
                'max_points' => 4,
                'sort_order' => $index + 1,
            ]);
        }
    }
}
