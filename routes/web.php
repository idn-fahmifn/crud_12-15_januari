<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
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

Route::put('category/{parameter}', [CategoryController::class, 'update'])
->name('category.update');

Route::delete('category/{parameter}', [CategoryController::class, 'delete'])
->name('category.delete');

// Route Item
Route::get('item', [ItemController::class, 'index'])
->name('item.index');

Route::post('item', [ItemController::class, 'store'])
->name('item.store');

Route::get('item/{parameter}', [ItemController::class, 'detail'])
->name('item.detail');

Route::put('item/{parameter}', [ItemController::class, 'update'])
->name('item.update');

Route::delete('item/{parameter}', [ItemController::class, 'delete'])
->name('item.delete');


