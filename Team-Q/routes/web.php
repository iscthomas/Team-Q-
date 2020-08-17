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

Route::get('/home', 'PageController@home');

Route::get('/games', 'PageController@games');

Route::get('/groups', 'PageController@groups');

Route::get('/scores', 'PageController@scores');

Route::get('/login', 'PageController@login');

Route::get('/register', 'PageController@register');

Route::get('/home', 'HomeController@index')->name('home');

//routes required for game crud features 
Route::resource('games','GameController');
// Route::get('/games', 'GameController@index')->name('games');
Route::post('/games/create', 'GameController@store')->name('games.create');
