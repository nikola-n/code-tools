<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    public function subcategories()
    {
        return $this->belongsToMany(Subcategory::class,'subcategory_technology');
    }
    public function categories()
    {
        return $this->BelongsTo(Category::class,'category_id');
    }
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
