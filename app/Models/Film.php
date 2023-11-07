<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $table = 'films';

    protected $casts = [
        'characters' => 'array',
        'planets' => 'array',
        'starships' => 'array',
        'vehicles' => 'array',
        'species' => 'array'
    ];
}
