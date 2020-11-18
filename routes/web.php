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

Route::get('/my-stats', "App\Http\Controllers\StatsController@mystats");
Route::get('/login', function () {return view('login');})->name('login');
Route::get('/register', function () {return view('register');})->name('register');
Route::get('/logout', "App\Http\Controllers\AuthController@logout")->name('logout');
Route::get('/token', "App\Http\Controllers\AuthController@token")->name('token');


Route::post('/register', "App\Http\Controllers\AuthController@register");
Route::post('/login', "App\Http\Controllers\AuthController@login");

Route::get('/', function () {return view('welcome');})->name('home');
