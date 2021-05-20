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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/configuracao','Usercontroller@config')->name('config');
Route::get('/change_password','Usercontroller@change_password')->name('change_password');

Route::POST('/user/update','Usercontroller@update')->name('user.update');
Route::POST('/user/update_password','Usercontroller@update_password')->name('user.update_password');
Route::POST('/user/getBackgroundByTeam','Usercontroller@getBackgroundByTeam')->name('user.getBackgroundByTeam');

Route::get('/select_team', 'TeamsController@index')->name('select_team');

