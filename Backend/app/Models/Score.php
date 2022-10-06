<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    // use HasFactory;

    protected $table = 'leaderboard';

    protected $fillable = [
        'username', 'score'
    ];

    public $timestamps = false;
}
