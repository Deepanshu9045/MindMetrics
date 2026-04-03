<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'type',
        'prompt',
        'options',
        'correct_option',
        'max_points',
        'sort_order',
    ];

    protected $casts = [
        'options' => 'array',
    ];
}
