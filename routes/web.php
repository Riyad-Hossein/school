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

Route::get(md5('admin/home'), 'Admin\AdminController@index')->name('admin.home');
// user controller used
Route::get(md5('admin/user/create'), 'Admin\UserController@create')->name('admin.user.create');

Route::post(md5('admin/user/store'), 'Admin\UserController@store')->name('admin.user.store');

Route::get(md5('admin/user/all'), 'Admin\UserController@allUser')->name('admin.user.all');
Route::get('admin/user/delete/{id}', 'Admin\UserController@delete');
Route::get('admin/user/edit/{id}', 'Admin\UserController@edit');
Route::post(md5('admin/user/update'), 'Admin\UserController@update')->name('admin.user.update');
