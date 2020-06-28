<?php

namespace App\Utilities;

//se so se filtrira treba da ima funckija

class CourseFilter extends QueryFilter
{

    public function type($type = '')
    {
        $this->query->where('type', $type);
    }

    public function name($name = '')
    {
        $this->query->where('name', $name);
    }

    public function medium($medium = '')
    {
        $this->query->where('medium', $medium);
    }

    public function popular()
    {
        $this->query->orderBy('votes', 'desc');
    }

    public function category($category = '')
    {
        $this->query->whereHas('subcategories', function ($q) use ($category) {
            $q->where('subcategory_name', $category);
        });
    }

}
