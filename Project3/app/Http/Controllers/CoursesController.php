<?php

namespace App\Http\Controllers;

use App\Course;
use App\Language;
use App\Subcategory;
use App\Technology;

class CoursesController extends Controller
{

    public function index($name)
    {
        $languages     = Language::all();
        $subcategories = Subcategory::all();
        $technologies  = Technology::with('courses.subcategories', 'courses.languages', 'courses.votes')
            ->where('technology_name', $name)
            ->first();
        $type          = [];
        $medium        = [];
        $level         = [];
        $subcategory   = [];
        $language      = [];
        foreach ($technologies->courses as $types) {
            array_push($type, $types['type']);
            array_push($medium, $types['medium']);
            array_push($level, $types['level']);
            foreach ($types->languages as $lang) {
                array_push($language, $lang->language_name);
            }
            foreach ($types->subcategories as $subcat) {
                array_push($subcategory, $subcat->subcategory_name);
            }
        }
        $type        = array_count_values($type);
        $medium      = array_count_values($medium);
        $level       = array_count_values($level);
        $subcategory = array_count_values($subcategory);
        $language    = array_count_values($language);

        return view('courses', compact('technologies', 'languages', 'subcategories', 'type', 'medium', 'level', 'subcategory', 'language'));
    }

    public function store()
    {
        $this->validateCourse();
        $course          = new Course(request(['name', 'type', 'medium', 'level', 'url']));
        $course->user_id = auth()->user()->id;
        $course->save();
        $course->subcategories()->attach(request('subcategory_name'));
        $course->languages()->attach(request('languages'));
        $course->technologies()->sync([1, 2, 3, 4]);

        return redirect()->route('programming')->with('message', 'You course was successfully added! It will be review and we will let you know if it is approved as soon as possible!');
    }

    public function validateCourse(): array
    {
        return request()->validate([
            'name'        => 'required|max:100',
            'type'        => 'required',
            'medium'      => 'required',
            'level'       => 'required',
            'url'         => 'required|max:200|url',
            'subcategory' => 'required|array|max:3',
            'languages'   => 'required',
        ]);
    }

    public function filters()
    {
        $filtered = Course::with('subcategories')->filterBy(request()->all())->get();

        return view('courses', compact($filtered));
    }

}
