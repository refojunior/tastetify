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

Route::group(['middleware' => 'checkSSL'], function(){
    Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/login', [\App\Http\Controllers\HomeController::class, 'login']);
    Route::get('/spotify', [\App\Http\Controllers\HomeController::class, 'spotify']);
    
    //generator
    Route::get('/generator', [\App\Http\Controllers\GeneratorController::class, 'generate'])->middleware('auth');
    Route::post('/generator', [\App\Http\Controllers\GeneratorController::class, 'doGenerate'])->middleware('auth');
    
    //top artists
    Route::get('/top-artists', [\App\Http\Controllers\GeneratorController::class, 'topArtists'])->middleware('auth');
    
    //top tracks 
    Route::get('/top-tracks', [\App\Http\Controllers\GeneratorController::class, 'topTracks'])->middleware('auth');
    
    //add email 
    Route::post('/add-email', [\App\Http\Controllers\HomeController::class, 'addEmail']);
    Route::post('/logout', [\App\Http\Controllers\HomeController::class, 'logout']);
});

