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

Route::get('/configuracao','UserController@config')->name('config');
Route::get('/change_password','UserController@change_password')->name('change_password');
Route::get('/user/avatar/{filename}','UserController@getImage')->name('user.avatar'); 

Route::get('/wizardingPortugal','wizardingPortugalController@show_portugal')->name('portugal');

Route::POST('/user/update','UserController@update')->name('user.update');
Route::POST('/user/update_password','UserController@update_password')->name('user.update_password');
Route::POST('/user/getBackgroundByTeam','UserController@getBackgroundByTeam')->name('user.getBackgroundByTeam');

Route::get('/select_team', 'TeamsController@index')->name('select_team');


Route::get('/carregarImage','ImageController@CriarImagem')->name('image_create');
Route::POST('/image/save','ImageController@save')->name('image.save');
Route::get('/image/file/{filename}','ImageController@getImage')->name('image.file');
Route::get('/image/file/{filename}','ImageController@getImage')->name('image.file'); 
Route::get('/image/{id}','ImageController@detail')->name('image.detail'); 

