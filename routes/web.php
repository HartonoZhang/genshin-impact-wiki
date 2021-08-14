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

Route::get('/', function () {
    return view('home');
});

Route::get('/home', 'GenshinController@index')->name('home');

Route::get('/home/{characters}', 'GenshinController@getData')->name('characters');
Route::get('/home/{weapons}', 'GenshinController@getData')->name('weapons');
Route::get('/home/{artifacts}', 'GenshinController@getData')->name('artifacts');