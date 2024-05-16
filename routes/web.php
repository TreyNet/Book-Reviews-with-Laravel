<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;
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
    // The root URL ("/") is redirected to the "books.index" route.
    return redirect()->route('books.index');});

// Defines resource routes for the BookController.
Route::resource('books', BookController::class)
    // Only 'index' and 'show' actions.
    ->only(['index', 'show']);


// Defines nested resource routes for the ReviewController. 
Route::resource('books.reviews', ReviewController::class)
    // Scoped by 'book'.    
    ->scoped(['review' => 'book'])
    // Only the 'create' and 'store' actions.
    ->only(['create', 'store']);
