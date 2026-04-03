# MindMetrics Laravel Starter

MindMetrics is a Laravel-based assessment project with three test types:

- **IQ** — Intelligence Quotient (15 objective MCQs)
- **EQ** — Emotional Quotient (15 self-assessment MCQs)
- **SQ** — Spiritual / Social Quotient (15 self-assessment MCQs)

After submission, the user sees:

- total score
- maximum possible score
- percentage
- a simple score interpretation

## What is included

This zip contains the **application files** for a fresh Laravel project:

- routes
- controller
- models
- migrations
- seeders
- Blade views
- sample project metadata

## Important note

This archive does **not** include the Laravel framework vendor files. To run it:

1. Create a fresh Laravel project.
2. Copy these files into that project.
3. Run migrations and seeders.

That keeps the zip lightweight and easy to inspect.

## Quick setup in a fresh Laravel project

```bash
composer create-project laravel/laravel mindmetrics
```

Copy the contents of this zip into the new Laravel project, then run:

```bash
php artisan migrate --seed
php artisan serve
```

Open:

```txt
http://127.0.0.1:8000
```

## Suggested database

SQLite is the fastest option for practice projects.

Example `.env` settings:

```env
DB_CONNECTION=sqlite
```

Then create an empty database file:

```bash
type nul > database\database.sqlite
```

Or use MySQL if you prefer.

## Project flow

1. User lands on the home page.
2. User selects IQ, EQ, or SQ.
3. User answers all questions.
4. On submit, Laravel calculates the score.
5. The result page displays the score and interpretation.

## Scoring logic

### IQ
- objective scoring
- each correct answer = 1 point
- max score = 15

### EQ / SQ
- self-rating scoring
- each answer has a value from 1 to 4
- max score = 60 for each test

## Disclaimer

This is an educational/demo assessment project. It is **not** a clinical or scientifically validated psychological diagnosis tool.
