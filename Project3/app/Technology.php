<?php

namespace App;

use App\Utilities\TechnologyFilter;
use Illuminate\Database\Eloquent\Builder;
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
    public function scopeFilterBy(Builder $query, array $filters)
    {
        $appliedFilters = new TechnologyFilter($query, $filters);

        return $appliedFilters->apply();
    }

}
