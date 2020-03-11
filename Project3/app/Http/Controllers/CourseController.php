<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class CourseController extends Controller
{
    public  function  index()
    {
//        dd(\request()->all());
        //dd(Course::with('categories')->get() );

        return Course::with('categories')->filterBy(request()->all())->get();

    }
}
