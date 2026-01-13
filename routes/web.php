<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route Category : 
Route::get('category', [CategoryController::class, 'index'])
->name('category.index');

Route::post('category', [CategoryController::class, 'store'])
->name('category.store');

Route::get('category/{parameter}', [CategoryController::class, 'detail'])
->name('category.detail');



