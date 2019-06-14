<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    //
    protected $fillable = [
        ''
    ];
    public function lectures(){
        return $this->belongsToMany(Lecture::class);
    }

    public function unit_lects(){
        return $this->belongsToMany(Unit_lect::class);
    }

}
