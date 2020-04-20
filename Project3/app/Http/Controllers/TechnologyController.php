<?php

namespace App\Http\Controllers;

use App\Subcategory;
use App\User;
use Illuminate\Http\Request;
use App\Technology;
use App\Language;

class TechnologyController extends Controller
{
    public function programming()
    {
            $languages = Language::all();
            $subcategories = Subcategory::all();
            $programming = Technology::with('categories')->where('category_id', 1)->get();
            return view('categories.programming', compact('programming','languages','subcategories'));

    }
    public function dataScience()
    {
        $languages = Language::all();
        $subcategories = Subcategory::all();
        $data_science = Technology::with('categories')->where('category_id', 2)->get();
        return view('categories.data_science', compact('data_science','languages','subcategories'));
    }

    public function devOps()
    {
        $languages = Language::all();
        $subcategories = Subcategory::all();
        $devOps = Technology::with('categories')->where('category_id', 3)->get();
        return view('categories.devops', compact('devOps','subcategories','languages'));
    }

    public function design()
    {
        $languages = Language::all();
        $subcategories = Subcategory::all();
        $design = Technology::with('categories')->where('category_id', 4)->get();
        return view('categories.design',compact('design','languages','subcategories'));
    }
    public function search(Request $request)
    {

        $input = $request->all();
        $query = $input['query'];

        $technologies = Technology::where('technology_name','like',"%$query%")
            ->get()
            ->toArray();

        return response()->json(['success'=>1, 'searchData'=>$technologies]);
    }

    public function filter()
    {
        return  Technology::with('courses')->filterBy(request()->all())->get();

    }
}
