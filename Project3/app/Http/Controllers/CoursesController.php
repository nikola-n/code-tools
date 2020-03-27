<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use App\Language;
use App\Subcategory;
use App\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class CoursesController extends Controller
{
    public function index($name)
    {
        $technologies= Technology::with('courses','subcategories')->where('name',$name)->first();

        $language = Language::all();
        return view('courses', compact('technologies','language'));
    }

    public function store()
    {
        //$validator = $this->validate()
    }
    public function validateCourse()
    {
        return request()->validate([
           'name'=>'required|max:200',
            'type'=>'required',
            'medium'=>'required',
            'level'=>'required',
            'description'=>'required',
        ]);
    }
}
