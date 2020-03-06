<?php
namespace App\Utilites;

//se so se filtrira treba da ima funckija
use function foo\func;

class CourseFilter extends \QueryFilter
{

    public function type($type)
    {
         $this->query->where('type',$type);
    }
    public function name($name)
    {
        $this->query->where('name',$name);
    }
    public function  category($category)
    {
        $this->query->whereHas('categories',function($q) use($category) {
           $q->where('name', $category);
        });
    }
}
