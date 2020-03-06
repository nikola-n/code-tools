<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    public function  scopeFilters($query, $filters)
    {
        $appliedFilters = new CourseFilter($query, $filters);

        return $appliedFilters->apply();
    }

    public function scopeFilters($query, $filters)
    {
      foreach($filters as $name => $value)
      {
        $query->orWhere('$name',$value);
      }
      return $query;
    }
}
