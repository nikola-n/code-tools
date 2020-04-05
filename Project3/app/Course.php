<?php

namespace App;

use App\Utilities\CourseFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = [];
    public function languages()
    {
        return $this->belongsToMany(Language::class,'course_languages');
    }

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function subcategories()
    {
        return $this->belongsToMany(Subcategory::class,'course_subcategory')->withTimestamps();
    }
    public function technologies()
    {
        return $this->BelongsToMany(Technology::class,'course_technology')->withTimestamps();
    }
    public function votes()
    {
        return $this->belongsToMany(User::class, 'course_user');
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
