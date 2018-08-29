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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::redirect('/', '/home');
Route::resource('/users', 'UsersController')->middleware(['role:superadmin|administrator']);;
Route::resource('/permissions', 'PermissionsController')->except('destroy')->middleware(['role:superadmin']);;
Route::resource('/roles', 'RolesController')->middleware(['role:superadmin']);
