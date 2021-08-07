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
Route::get('user-form','UserController@form');
Route::post('insert','UserController@insert');
Route::get('show-data','UserController@showdata');
Route::get('edit/{emp_id}','UserController@edit');
Route::post('update','UserController@update');
Route::get('delete/{emp_id}','UserController@deleteData');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

