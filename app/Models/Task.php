<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
        'description',
        'story_points',
    ];

    protected $casts = [
        'id' => 'string',
        'name' => 'string',
        'description' => 'string',
        'story_points' => 'int',
    ];
}
