# Install in a fresh Laravel project

## 1) Create a new Laravel project
```bash
composer create-project laravel/laravel mindmetrics
```

## 2) Copy these folders/files into the new project
- `app/Http/Controllers/MindMetricsController.php`
- `app/Models/Question.php`
- `app/Models/TestAttempt.php`
- `database/migrations/...`
- `database/seeders/...`
- `resources/views/...`
- `routes/web.php`

## 3) Configure the database

### SQLite example
In `.env`:
```env
DB_CONNECTION=sqlite
```

Create the database file:
```bash
type nul > database\database.sqlite
```

## 4) Run the database setup
```bash
php artisan migrate --seed
```

## 5) Start the app
```bash
php artisan serve
```

## 6) Open in browser
```txt
http://127.0.0.1:8000
```
