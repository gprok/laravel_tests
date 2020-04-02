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

/* Test Middleware */
Route::get('age/form', 'AgeController@form');
Route::get('age/restricted', 'AgeController@restricted');
Route::post('age/dashboard', 'AgeController@dashboard')->middleware('age');

/* Test many-to-many relationship */
Route::get('event/register', 'EventController@assign_event_form');
Route::post('event/do/register', 'EventController@do_assign_event');
Route::get('event/event/{id}', 'EventController@event');
Route::get('event/member/{id}', 'EventController@member');
Route::get('event/registered/list', 'EventController@registered_list');
Route::get('event/cancel/{event_id}/{member_id}', 'EventController@cancel');

/* WYSIWYG editors */
Route::get('editor/tinymce', 'EditorController@tinymce');
Route::post('editor/tinymce/process', 'EditorController@tinymce_process');

/* Google Maps */
Route::get('maps/hello', 'MapsController@hello');
