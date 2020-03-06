<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    //

    public  function  index()
    {
        return Course::with('categories')->FilterBy->($request->all())
    }
}
