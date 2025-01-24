<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'x',
        'y',
        'year',
        'crew_id'
    ];

    public function crew()
{
    return $this->belongsTo(Crew::class);
}

}


