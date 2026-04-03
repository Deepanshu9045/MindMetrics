@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <a href="{{ route('home') }}" class="text-decoration-none">&larr; Back to home</a>
            <h1 class="h2 fw-bold mt-2 mb-1">{{ $meta['full_title'] }}</h1>
            <p class="text-secondary mb-0">{{ $meta['description'] }}</p>
        </div>
        <span class="metric-badge">{{ $questions->count() }} Questions</span>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger rounded-4">
            <ul class="mb-0 ps-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tests.submit', $type) }}" method="POST">
        @csrf

        <div class="question-card bg-white p-4 mb-4">
            <label for="participant_name" class="form-label fw-semibold">Participant name (optional)</label>
            <input
                type="text"
                id="participant_name"
                name="participant_name"
                class="form-control form-control-lg"
                value="{{ old('participant_name') }}"
                placeholder="Enter your name"
            >
        </div>

        @foreach ($questions as $index => $question)
            <div class="question-card bg-white p-4 mb-4">
                <div class="d-flex justify-content-between align-items-start gap-3 mb-3">
                    <h2 class="h5 mb-0">Q{{ $index + 1 }}. {{ $question->prompt }}</h2>
                    <span class="metric-badge">
                        {{ $type === 'iq' ? '1 point' : '1 - 4 points' }}
                    </span>
                </div>

                <div class="row g-3">
                    @foreach ($question->options as $option)
                        <div class="col-md-6">
                            <label class="option-box w-100">
                                <input
                                    type="radio"
                                    name="answers[{{ $question->id }}]"
                                    value="{{ $option['key'] }}"
                                    class="form-check-input me-2"
                                    {{ old("answers.{$question->id}") === $option['key'] ? 'checked' : '' }}
                                >
                                <strong>{{ $option['key'] }}.</strong> {{ $option['text'] }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-lg px-5 rounded-pill">
                Submit Test
            </button>
        </div>
    </form>
@endsection
