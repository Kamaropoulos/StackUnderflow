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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'QuestionsController@ListAll');

Route::get('/questions', 'QuestionsController@ListAll');

Route::get('/questions/ask', 'QuestionsController@AskForm');

Route::post('/questions/ask', 'QuestionsController@Ask');

Route::get('/questions/{id}', 'QuestionsController@ViewQuestion');

Route::get('/questions/edit/{id}', 'QuestionsController@EditForm');

Route::post('/questions/edit/{id}', 'QuestionsController@Edit');

Route::post('/questions/{id}/answer', 'QuestionsController@Answer');

Route::get('/questions/{id}/downvote', 'QuestionsController@Downvote');