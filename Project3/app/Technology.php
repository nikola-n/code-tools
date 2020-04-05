<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{

    public function categories()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function courses()
    {
        return $this->belongsToMany(Course::class,'course_technology')->withTimestamps();
    }
    
}
