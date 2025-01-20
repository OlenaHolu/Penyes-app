<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrawResult extends Model
{
    use HasFactory;

    protected $fillable = ['year', 'results'];

    protected $casts = [
        'results' => 'array', // Convierte los resultados JSON a un arreglo cuando los recuperes
    ];
}
