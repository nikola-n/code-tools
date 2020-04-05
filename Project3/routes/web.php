<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Language;
use App\Subcategory;

Route::get('/', function () {
    $languages = Language::all();
   $subcategories = Subcategory::all();
    return view('welcome',compact('subcategories','languages'));
})->name('programming');

Route::get('/data-science', function () {
    $languages = Language::all();
    $subcategories = Subcategory::all();
   return view ('categories.data_science',compact('subcategories','languages'));
})->name('data-science');

Route::get('/devops', function () {
    $languages = Language::all();
    $subcategories = Subcategory::all();
   return view ('categories.devops',compact('subcategories','languages'));
})->name('devops');

Route::get('/design', function () {

    $languages = Language::all();
    $subcategories = Subcategory::all();
   return view ('categories.design',compact('subcategories','languages'));
})->name('design');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('login/{provider}','SocialLoginController@redirect')->name('social.login');
Route::get('login/{provider}/callback','SocialLoginController@callback');


Route::post('/','CoursesController@store')->name('store');
Route::get('tutorials/{name}','CoursesController@index')->name('tutorials');
Route::post('tutorials/{name}', 'CoursesController@addVote')->name('votes');
Route::put('/tutorials/{id}', 'CoursesController@unVote');
//Route::get('courses','TechnologyController@index');
//Route::get('categories','CategoryController@index');

