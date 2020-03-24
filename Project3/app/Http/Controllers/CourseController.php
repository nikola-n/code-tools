<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class CourseController extends Controller
{
    public function index()
    {
       $programming =  Course::with('categories')->where('category_id', 1)->get();

        return response()->json(['success'=> 1, 'data' => $programming]);
    }
    public function dataScience()
    {
        $data_science = Course::with('categories')->where('category_id', 2)->get();
        return response()->json(['success'=>1, 'data'=>$data_science]);
    }

    public function devops()
    {
        $devops = Course::with('categories')->where('category_id', 3)->get();
        return response()->json(['success'=>1, 'data'=>$devops]);
    }

    public function design()
    {
        $design = Course::with('categories')->where('category_id', 4)->get();
        return response()->json(['success'=>1, 'data'=>$design]);
    }
}
