<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public  function courses()
    {
        return $this->BelongsToMany(Course::class,'categories_courses');
    }
}
