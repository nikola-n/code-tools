<?php

namespace App\Http\Controllers;

use App\Course;

class CourseVotesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param Course $course
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Course $course)
    {
        if (auth()->check()) {
            $course->toggle();
        } else {
            flash('Sorry, you must Sign In first to give your Vote!')->error();
        }

        return back();
    }

}
