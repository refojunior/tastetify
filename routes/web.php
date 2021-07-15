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


Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/login', [\App\Http\Controllers\HomeController::class, 'login']);
Route::get('/spotify', [\App\Http\Controllers\HomeController::class, 'spotify']);

//generator
Route::get('/generator', [\App\Http\Controllers\GeneratorController::class, 'generate'])->middleware('auth');
Route::post('/generator', [\App\Http\Controllers\GeneratorController::class, 'doGenerate'])->middleware('auth');

Route::post('/logout', [\App\Http\Controllers\HomeController::class, 'logout']);

Route::resource('/posts', \App\Http\Controllers\PostController::class);