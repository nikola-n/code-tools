<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $courses = Course::all()->where('approved', 0)->get();

        return view('admin', compact('courses'));
    }
}
