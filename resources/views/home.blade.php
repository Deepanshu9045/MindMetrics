@extends('layouts.app')

@section('content')
    <div class="hero-card bg-white p-4 p-md-5 mb-4">
        <span class="brand-pill">MindMetrics</span>
        <div class="row align-items-center mt-3">
            <div class="col-lg-8">
                <h1 class="display-6 fw-bold mb-3">IQ, EQ, and SQ test system in Laravel</h1>
                <p class="lead text-secondary mb-3">
                    Select a test, answer the multiple-choice questions, and instantly view the score based on your responses.
                </p>
                <p class="disclaimer mb-0">
                    Demo project for educational use. This is not a medical or clinical diagnosis tool.
                </p>
            </div>
            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                <div class="d-inline-block bg-light rounded-4 p-4">
                    <div class="fw-semibold">Included</div>
                    <div class="text-secondary">3 test types</div>
                    <div class="text-secondary">45 total questions</div>
                    <div class="text-secondary">Automatic scoring</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        @foreach ($tests as $type => $test)
            <div class="col-md-6 col-lg-4">
                <div class="test-card bg-white p-4 h-100">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <h2 class="h4 mb-0">{{ $test['title'] }}</h2>
                        <span class="metric-badge">{{ $test['badge'] }}</span>
                    </div>

                    <p class="text-secondary">{{ $test['description'] }}</p>

                    <ul class="list-unstyled small text-secondary mb-4">
                        <li class="mb-2"><strong>Questions:</strong> {{ $test['question_count'] }}</li>
                        <li class="mb-2"><strong>Max score:</strong> {{ $test['max_score'] }}</li>
                        <li><strong>Scoring:</strong> {{ $test['score_note'] }}</li>
                    </ul>

                    <a href="{{ route('tests.show', $type) }}" class="btn btn-primary w-100">
                        Start {{ $test['title'] }}
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
