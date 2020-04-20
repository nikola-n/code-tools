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

use App\Course;

//technologies routes

    Route::get('/', 'TechnologyController@programming')->name('programming');
    Route::get('/data-science', 'TechnologyController@dataScience')->name('data-science');
    Route::get('/devops', 'TechnologyController@devOps')->name('devops');
    Route::get('/design', 'TechnologyController@design')->name('design');



Auth::routes();

//socialite routes
Route::get('login/{provider}','SocialLoginController@redirect')->name('social.login');
Route::get('login/{provider}/callback','SocialLoginController@callback');

//courses routes
Route::post('/','CoursesController@store')->name('store');
Route::get('tutorials/{name}','CoursesController@index')->name('tutorials');
Route::get('/recent',function () {
    return Course::with('subcategories')->latest()->get();
});
//Route::get('courses','CoursesController@index');
//Route::get('categories','CategoryController@index');

Route::get('filtered', function (){
    return Course::with('subcategories')->filterBy(request()->all())->get();
});

Route::post('/votes/{course}','CourseVotesController@store');

Route::get('/admin','AdminController@index');
