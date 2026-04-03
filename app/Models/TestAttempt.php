<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestAttempt extends Model
{
    protected $fillable = [
        'participant_name',
        'type',
        'answers',
        'score',
        'max_score',
        'percentage',
        'interpretation',
    ];

    protected $casts = [
        'answers' => 'array',
        'percentage' => 'decimal:2',
    ];
}
