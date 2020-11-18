<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/episodes/{id}', 'App\Http\Controllers\EpisodeController@single');
    Route::get('/episodes', 'App\Http\Controllers\EpisodeController@list')->middleware('pagination');

    Route::get('/characters/random', 'App\Http\Controllers\CharacterController@single');
    Route::get('/characters', 'App\Http\Controllers\CharacterController@list')->middleware('pagination');

    Route::get('/quotes/random', 'App\Http\Controllers\QuoteController@single');
    Route::get('/quotes', 'App\Http\Controllers\QuoteController@list')->middleware('pagination');
});
