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

Route::get('home', 'HomeController@home')->name('home');

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/user_login', 'AuthController@user_login');
Route::get('/logout', 'AuthController@logout')->name('logout');  


Route::get('/register', 'AuthController@register');
Route::post('/save_register', 'AuthController@save_register')->name('save_user');




