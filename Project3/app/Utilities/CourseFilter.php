<?php

namespace App\Utilities;

//se so se filtrira treba da ima funckija

class CourseFilter extends QueryFilter
{

    public function type($type = '')
    {
         $this->query->where('type',$type);
    }
    public function name($name = '')
    {
        $this->query->where('name',$name);
    }
    public function category($category = '')
    {
        $this->query->whereHas('categories',function($q) use ($category) {
           $q->where('name', $category);
        });
    }
    public function popular()
    {
        $this->query->where('popular',1)->orderBy('name');
    }
}
