<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'MindMetrics' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f5f7ff 0%, #eef2ff 100%);
            min-height: 100vh;
        }
        .hero-card,
        .test-card,
        .result-card,
        .question-card {
            border: 0;
            border-radius: 20px;
            box-shadow: 0 14px 30px rgba(19, 32, 85, 0.08);
        }
        .brand-pill {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 999px;
            background: #0d6efd;
            color: white;
            font-weight: 600;
            font-size: 0.9rem;
        }
        .metric-badge {
            background: #edf2ff;
            color: #2848a9;
            border-radius: 999px;
            padding: 0.35rem 0.75rem;
            font-size: 0.85rem;
            font-weight: 600;
        }
        .option-box {
            border: 1px solid #dde3f2;
            border-radius: 14px;
            padding: 0.9rem 1rem;
            transition: 0.2s ease;
        }
        .option-box:hover {
            border-color: #0d6efd;
            background: #f8fbff;
        }
        .score-ring {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            background: conic-gradient(#0d6efd calc(var(--value) * 1%), #e9eef9 0);
            margin: 0 auto;
            position: relative;
        }
        .score-ring::after {
            content: "";
            position: absolute;
            inset: 12px;
            border-radius: 50%;
            background: #fff;
        }
        .score-content {
            position: relative;
            z-index: 2;
            text-align: center;
        }
        .disclaimer {
            font-size: 0.92rem;
            color: #5f6b8a;
        }
    </style>
</head>
<body>
    <div class="container py-4 py-md-5">
        @yield('content')
    </div>
</body>
</html>
