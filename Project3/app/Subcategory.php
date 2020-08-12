<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    public function technologies()
    {
        return $this->belongsToMany(Technology::class, 'subcategory_technology');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_subcategory');
    }
}
