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
    return redirect()->route('home');
});

Auth::routes();

Route::group( ['middleware' => 'auth' ], function(){
	Route::get('/home', 'HomeController@index')->name('home');

	
	Route::Group(['prefix'=>'shop'], function(){
		Route::get('', 'Shop\ProductController@index');
	
	});
	
	Route::group(['prefix'=>'note'], function(){
		Route::view('', 'note.index');
		Route::get('/list', 'NoteController@listNotes');
		Route::POST('/postion', 'NoteController@savePostion');
		Route::POST('/text', 'NoteController@saveText');
		Route::POST('/new', 'NoteController@newNote');
		Route::POST('/delete', 'NoteController@deleteNote');
	});
});