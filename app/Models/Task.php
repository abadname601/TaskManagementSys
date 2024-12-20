<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'deadline', 'category', 'completed'];

    // Automatically cast 'deadline' to a Carbon instance
    protected $casts = [
        'deadline' => 'datetime',
    ];
}
