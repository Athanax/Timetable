<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit_lect extends Model
{
    //
    protected $fillable = [

    ];

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function units(){
        return $this->belongsToMany(Unit::class);
    }
}
