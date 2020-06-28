<?php

namespace App;

use App\Utilities\CourseFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use Votable;

    protected $fillable = ['name', 'type', 'medium', 'level', 'url'];

    public function languages()
    {
        return $this->belongsToMany(Language::class, 'course_languages');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function subcategories()
    {
        return $this->belongsToMany(Subcategory::class, 'course_subcategory')->withTimestamps();
    }

    public function technologies()
    {
        return $this->BelongsToMany(Technology::class, 'course_technology')->withTimestamps();
    }

    /**
     * @param Builder $query
     * @param array   $filters
     *
     * @return Builder
     */
    public function scopeFilterBy(Builder $query, array $filters)
    {
        $appliedFilters = new CourseFilter($query, $filters);

        return $appliedFilters->apply();
    }

}
