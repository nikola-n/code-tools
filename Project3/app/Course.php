<?php

namespace App;

use App\Utilities\CourseFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function languages()
    {
        return $this->BelongsToMany(Language::class,'course_languages');
    }

    public function users()
    {
        return $this->BelongsTo(User::class,'user_id');
    }
    public function subcategories()
    {
        return $this->belongsToMany(Subcategory::class,'course_subcategory');
    }
    public function technologies()
    {
        return $this->BelongsTo(Technology::class);
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
