<?php

namespace App\Http\Controllers;

use App\Course;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $courses = \DB::table('courses')->orderBy('approved', 'asc')->get();

        return view('admin.admin', compact('courses'));
    }

    public function approve($id)
    {
        $course = Course::find($id);
        $course->approved = 1;
        $course->save();

        return redirect('/admin');
    }
    public function destroy($id)
    {
        Course::where('id',$id)->delete();
        return redirect('/admin');
    }
}
