<?php

namespace App\Http\Controllers;

use App\Course;
use App\Notifications\SendApprovedCourseEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function index()
    {
        $courses = \DB::table('courses')->orderBy('approved', 'asc')->paginate(10);

        return view('admin.admin', compact('courses'));
    }

    public function approve($id)
    {
        $course           = Course::find($id);
        $course->approved = 1;
        $course->save();

        $course->notify(new SendApprovedCourseEmail($course));

        return redirect('/admin');
    }

    public function destroy($id)
    {
        Course::where('id', $id)->delete();
        return redirect('/admin');
    }
}
