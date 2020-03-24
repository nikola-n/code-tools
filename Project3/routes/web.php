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

Route::get('/', function () {
    return view('welcome');
})->name('programming');

Route::get('/data-science', function () {
   return view ('categories.data_science');
})->name('data-science');

Route::get('/devops', function () {
   return view ('categories.devops');
})->name('devops');

Route::get('/design', function () {
   return view ('categories.design');
})->name('design');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('login/{provider}','SocialLoginController@redirect')->name('social.login');
Route::get('login/{provider}/callback','SocialLoginController@callback');


Route::get('courses','CourseController@index');
Route::get('categories','CategoryController@index');
Route::get('tutorials/{name}','CourseController@index')->name('tutorials');
