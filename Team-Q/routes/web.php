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

Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('index')->middleware('verified');


Route::get('/highscores/{highscore}', 'DatabaseController@showHighscores')->middleware('verified');

Route::get('/games', 'PageController@games')->middleware('verified');

Route::get('/groups', 'PageController@groups')->middleware('verified');

Route::get('/scores', 'PageController@scores')->middleware('verified');

Route::name('auth.resend_confirmation')->get('/register/confirm/resend', 'Auth\RegisterController@resendConfirmation');

Route::name('auth.confirm')->get('/register/confirm/{confirmation_code}', 'Auth\RegisterController@confirm'); 

//routes required for game crud features
Route::resource('games','GameController');
Route::post('/games/create', 'GameController@store')->name('games.create')->middleware('verified');

//routes required for group crud features
Route::resource('groups','GroupController');
Route::post('/groups/create', 'GroupController@store')->name('groups.create')->middleware('verified');

