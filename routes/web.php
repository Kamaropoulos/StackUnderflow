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

Route::get('/home', 'QuestionsController@index');

Route::get('/', 'QuestionsController@index');

Route::get('/questions', 'QuestionsController@index');

Route::get('/questions/ask', 'QuestionsController@AskForm');



Route::get('/questions/{id}', 'QuestionsController@ViewQuestion');

Route::group([ 'middleware' => ['auth']], function() {

    Route::post('/questions/ask', 'QuestionsController@Ask');

    Route::get('/questions/edit/{id}', 'QuestionsController@EditForm');

    Route::post('/questions/edit/{id}', 'QuestionsController@Edit');

    Route::post('/questions/{id}/answer', 'AnswersController@Answer');

    Route::get('/questions/{id}/upvote', 'VotesController@UpvoteQuestion');

    Route::get('/questions/{id}/downvote', 'VotesController@DownvoteQuestion');

    Route::get('/questions/{id}/answer/{aid}/upvote', 'VotesController@UpvoteAnswer');

    Route::get('/questions/{id}/answer/{aid}/downvote', 'VotesController@DownvoteAnswer');

});