<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Technology;
use App\Course;

class TechnologyController extends Controller
{
    public function index()
    {
       $programming =  Technology::with('categories')->where('category_id', 1)->get();

        return response()->json(['success'=> 1, 'data' => $programming]);
    }
    public function dataScience()
    {
        $data_science = Technology::with('categories')->where('category_id', 2)->get();
        return response()->json(['success'=>1, 'data'=>$data_science]);
    }

    public function devops()
    {
        $devops = Technology::with('categories')->where('category_id', 3)->get();
        return response()->json(['success'=>1, 'data'=>$devops]);
    }

    public function design()
    {
        $design = Technology::with('categories')->where('category_id', 4)->get();
        return response()->json(['success'=>1, 'data'=>$design]);
    }
}
