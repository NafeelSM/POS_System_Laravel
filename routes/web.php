<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('layout');
});

Route::resource('category', CategoryController::class);
