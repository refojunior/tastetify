<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generated extends Model
{
    use HasFactory;

    protected $table = 'generated';

    protected $fillable = [
        'spotify_id',
        'time_range',
        'image',
    ];

}
