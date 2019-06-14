<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $fillable = [
        ''
    ];

    public function lectures(){
        return $this->belongsToMnay(Lecture::class);
    }
}
