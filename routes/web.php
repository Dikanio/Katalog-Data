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

// Route::get('/', function () {
//     return view('create');
// });

Route::get('/', function() {
    if(Auth::guest()){
        return view('auth.login');
    } else {
        redirect('/');
    }
});

Route::post('/data/store', 'DataController@store');

Route::get('/data/view', 'DataController@index');

Route::get('/data/create', 'DataController@create');
Route::get('/data/create/getBidang/{param}','DataController@getBidang');
Route::get('/data/create/getSeksi/{param}','DataController@getSeksi');


Route::get('/data', 'DataController@index');

Route::get('/data/edit/{id}', 'DataController@edit');
Route::post('/data/update/{id}', 'DataController@update');

Route::get('/data/detail/{id}', 'DataController@show');

Auth::routes();

Route::get('/home', 'DataController@index')->name('home');
