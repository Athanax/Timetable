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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/courses', 'CoursesController');
Route::resource('/units', 'UnitsController');
Route::resource('/lecturers', 'LecturersController');
Route::resource('/rooms', 'RoomsController');
Route::resource('/lessons', 'LessonsController');


Route::post('/lecturers/add_unit', 'LecturersController@add_unit')->name('lecturers.add_unit');
Route::post('/courses/add_unit', 'CoursesController@add_unit')->name('courses.add_unit');
Route::post('/courses/remove', 'CoursesController@remove')->name('courses.remove');
Route::post('/courses/assign', 'CoursesController@assign')->name('courses.assign');
Route::post('/courses/assign_save', 'CoursesController@assign_save')->name('courses.assign_save');
Route::get('/timetable', 'LessonsController@timetable')->name('lessons.timetable');
Route::get('/view_timetable', 'LessonsController@view')->name('lessons.view_timetable');
Route::get('/apply_changes', 'LessonsController@apply_changes')->name('lessons.apply_changes');
Route::get('/print', 'LessonsController@print')->name('lessons.print');

