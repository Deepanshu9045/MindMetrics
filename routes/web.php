<?php

use App\Http\Controllers\MindMetricsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MindMetricsController::class, 'home'])->name('home');

Route::get('/test/{type}', [MindMetricsController::class, 'show'])
    ->whereIn('type', ['iq', 'eq', 'sq'])
    ->name('tests.show');

Route::post('/test/{type}', [MindMetricsController::class, 'submit'])
    ->whereIn('type', ['iq', 'eq', 'sq'])
    ->name('tests.submit');

Route::get('/result/{attempt}', [MindMetricsController::class, 'result'])
    ->name('tests.result');
