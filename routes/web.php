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
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/welcome', 'PagesController@index');

Route::get('/', function () {
    return view('welcome');
});



Route::get('/users/{id}', function ($id) {
    return 'Welcome, '.$id;
});

Route::resource('posts', 'PostsController');

Route::resource('match', 'MatchController');


Route::get('/matches', 'MatchController@index');

Route::get('/matches/create', 'MatchController@create');

Route::post('/matches', 'MatchController@store');

Route::get('/matches/{id}/edit', 'MatchController@edit');

Route::post('/matches/{id}', 'MatchController@update');

Route::get('/match/{id}/match_odd/create', 'MatchOddController@create');

Route::post('/match_odd', 'MatchOddController@store');


Route::get('/match/{id}/bet/create', 'BetController@create');

Route::post('/bet', 'BetController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
