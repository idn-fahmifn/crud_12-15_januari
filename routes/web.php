<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Route testing untuk menampilkan halaman statis.
Route::view('tampilan','template.template');
