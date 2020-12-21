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
Route::group(['prefix'=>'gpons'], function(){
    Route::get('/show','ShowController@show')->name('search');
    Route::get('/insert','ShowController@insert')->name('insert_page');
    Route::get('/search','ShowController@search')->name('search_page');
    Route::post('/data','ShowController@data')->name('data');
    Route::get('/next_ip/{my_ip}/{my_id}/{free_ip}','ShowController@next_ip')->name('next_ip');
    Route::get('/edit/{my_id}','ShowController@edit')->name('edit');
    Route::post('/update/{my_id}','ShowController@update')->name('update');


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
