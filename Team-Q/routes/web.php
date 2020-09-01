<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/highscores/{highscore}', 'DatabaseController@showHighscores');

Route::get('/games', 'PageController@games');

// Route::get('/groups', 'PageController@groups');

Route::get('/scores', 'PageController@scores');

//routes required for game crud features 
Route::resource('games','GameController');
Route::post('/games/create', 'GameController@store')->name('games.create');

//routes required for group crud features
Route::resource('groups','GroupController');
Route::post('/groups/create', 'GroupController@store')->name('groups.create');

Route::get('/join/{group}', 'GroupController@join');

Route::get('/leave/{group}', 'GroupController@leave');