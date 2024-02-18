<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puzzle extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type_id',
        'puzzle',
        'solution',
        'difficulty_rating',
        'points',
        'completed'
    ];

    protected $casts = [
        'puzzle' => 'json',
        'solution' => 'json',
        'completed' => 'boolean'
    ];

    const TYPES = [
      'SUDOKU' => 1
    ];
}
