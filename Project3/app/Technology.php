<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    public function courses()
    {
        return $this->belongsToMany(Course::class,'course_technology');
    }
}
