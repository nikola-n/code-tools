<?php

namespace App;

use App\Utilities\CourseFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'categories_courses' );
    }

    /**
     * @param Builder $query
     * @param array $filters
     * @return Builder
     */
    public function scopeFilterBy(Builder $query, array $filters)
    {
        $appliedFilters = new CourseFilter($query, $filters);

        return $appliedFilters->apply();
    }

//    public function scopeFilters($query, $filters)
//    {
//      foreach($filters as $name => $value)
//      {
//        $query->orWhere('$name',$value);
//      }
//      return $query;
//    }

}
