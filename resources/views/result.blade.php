@extends('layouts.app')

@section('content')
    <div class="result-card bg-white p-4 p-md-5">
        <div class="text-center mb-4">
            <span class="brand-pill">Result</span>
            <h1 class="display-6 fw-bold mt-3 mb-2">{{ $meta['full_title'] }}</h1>
            <p class="text-secondary mb-0">
                Participant: <strong>{{ $attempt->participant_name }}</strong>
            </p>
        </div>

        <div class="row align-items-center g-4">
            <div class="col-lg-5 text-center">
                <div class="score-ring" style="--value: {{ $attempt->percentage }}">
                    <div class="score-content">
                        <div class="h3 fw-bold mb-0">{{ number_format((float) $attempt->percentage, 0) }}%</div>
                        <div class="text-secondary small">Overall Score</div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="row g-3">
                    <div class="col-sm-4">
                        <div class="bg-light rounded-4 p-3 h-100">
                            <div class="text-secondary small">Score</div>
                            <div class="h3 fw-bold mb-0">{{ $attempt->score }}</div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="bg-light rounded-4 p-3 h-100">
                            <div class="text-secondary small">Max Score</div>
                            <div class="h3 fw-bold mb-0">{{ $attempt->max_score }}</div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="bg-light rounded-4 p-3 h-100">
                            <div class="text-secondary small">Test Type</div>
                            <div class="h5 fw-bold mb-0">{{ $meta['title'] }}</div>
                        </div>
                    </div>
                </div>

                <div class="alert alert-primary rounded-4 mt-4 mb-0">
                    <strong>Interpretation:</strong> {{ $attempt->interpretation }}
                </div>
            </div>
        </div>

        <div class="text-center mt-4 d-flex flex-column flex-sm-row justify-content-center gap-3">
            <a href="{{ route('tests.show', $attempt->type) }}" class="btn btn-outline-primary btn-lg px-4 rounded-pill">
                Retake Test
            </a>
            <a href="{{ route('home') }}" class="btn btn-primary btn-lg px-4 rounded-pill">
                Go to Home
            </a>
        </div>

        <p class="disclaimer text-center mt-4 mb-0">
            This result is for educational/demo purposes and should not be treated as a clinical assessment.
        </p>
    </div>
@endsection
