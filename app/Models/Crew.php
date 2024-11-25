<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Crew extends Model
{
    protected $fillable = [
        'name',
        'year',
        'slogan',
        'color',
        'platform_id'
    ];
}
