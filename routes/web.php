<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route Category : 
Route::get('category', [CategoryController::class, 'index'])
->name('category.index');



