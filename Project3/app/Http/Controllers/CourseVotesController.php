<?php

namespace App\Http\Controllers;

use App\Course;
use App\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseVotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//       $votes = Course::withCount(['voted'])->first();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Course $course
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Course $course)
    {
        if(auth()->check())
        {
            $course->toggle();
        } else
            flash('Sorry, you must Sign In first to give your Vote!')->error();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function show(Vote $vote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function edit(Vote $vote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vote $vote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Course $course)
    {
        if(Auth::check())
        {
            $course->unvote();
        }
        return back();
    }
}
