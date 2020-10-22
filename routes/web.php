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
Auth::routes();

Route::get('/', 'postcontroller@index');

Route::get('/p/create', 'postcontroller@create');
Route::get('/p/{post}', 'postcontroller@show');
Route::post('/p', 'postcontroller@store');
Route::post('/follow/{user}', 'followsController@store');
Route::get('/profile/{user}', 'profilecontroller@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'profilecontroller@edit');
Route::get('/admin/createroles', 'profilecontroller@edit');
Route::patch('/profile/{user}', 'profilecontroller@update')->name('profile.edit');

