<?php

namespace App;

use App\Utilities\CourseFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categories()
    {
        return $this->BelongsTo(Category::class,'category_id');
    }
    public function languages()
    {
        return $this->hasMany(Language::class,'languages_id');
    }
    public function technologies()
    {
        return $this->belongsToMany(Technology::class,'course_technology');
    }
    public function users()
    {
        return $this->hasOne(User::class,'user_id');
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

    public function scopeFilters($query, $filters)
    {
      foreach($filters as $name => $value)
      {
        $query->orWhere($name,$value);
      }
      return $query;
    }

}
