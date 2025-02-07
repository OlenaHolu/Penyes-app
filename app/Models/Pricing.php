<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    use HasFactory;

    protected $fillable = ['crew_id', 'amount', 'year'];

    public function crew(){
        return $this->belongsTo(Crew::class);
    }

}
