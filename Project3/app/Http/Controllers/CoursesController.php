<?php

namespace App\Http\Controllers;

use App\Course;
use App\Language;
use App\Subcategory;
use App\Technology;
use App\User;
use Illuminate\Http\Request;

class CoursesController extends Controller {
    public function index($name)
    {
        $languages = Language::all();
        $subcategories = Subcategory::all();
        $technologies = Technology::with('courses.subcategories', 'courses.languages','courses.votes')->where('technology_name', $name)->first();

        $type = [];
        $medium = [];
        $level = [];
        $subcategory = [];
        $language = [];
        foreach ($technologies->courses as $types)
        {
            array_push($type, $types['type']);
            array_push($medium, $types['medium']);
            array_push($level, $types['level']);
            foreach ($types->languages as $lang)
            {
                array_push($language, $lang->language_name);
            }
            foreach ($types->subcategories as $subcat)
            {
                array_push($subcategory, $subcat->subcategory_name);
            }
        }
        $type = array_count_values($type);
        $medium = array_count_values($medium);
        $level = array_count_values($level);
        $subcategory = array_count_values($subcategory);
        $language = array_count_values($language);


        return view('courses', compact('technologies', 'languages', 'subcategories', 'type', 'medium', 'level', 'subcategory', 'language'));
    }

    public function store(Request $request)
    {
        $validateCourse = $request->validate([
            'name' => 'required|max:200',
            'type' => 'required',
            'medium' => 'required',
            'level' => 'required',
            'url' => 'required',
            //   'subcategory_name' => 'max:3|exists:subcategory_name,id'
        ]);
        $course = new Course();
        $course->name = $request->name;
        $course->type = $request->type;
        $course->medium = $request->medium;
        $course->url = $request->url;
        $course->level = $request->level;
        $course->user_id = auth()->user()->id;
        $course->save();
        $course->subcategories()->attach(request('subcategory_name'));
        $course->languages()->attach(request('languages'));
        $course->technologies()->sync([1, 2, 3, 4]);

        return redirect(route('programming'));
    }



    public function addVote($id)
    {
        Course::where('id',$id)->increment('votes',1);
    }







//    public function saveVote(Request $request ,$id)
//    {
//        $vote = auth()->user();
//        $vote->votes()->attach(request('name'));
//        $vote->votes()->attach()
//    }
//    public function unVote(User $user)
//    {
//        return $this->votes()->detach($user);
//    }
//    public function voted(User $user)
//    {
//        return $this->votes()->where('user_id', $user->id)->exists();
//    }
//
//    public function toggleVote(User $user)
//    {
//        if($this->voted($user)){
//            return $this->unVote($user);
//        }
//        return $this->saveVote($user);
//    }

//    public function addVote(User $user)
//    {
//        auth()->user()->toggleVote($user);
////        return back();
//    }

}
