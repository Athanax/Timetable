<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    //

    public function users(){
        return $this->hasMany(User::class);
    }

    public function courses(){
        return $this->hasMany(Course::class);
    }

    public function units(){
        return $this->hasMany(Unit::class);
    }
}
