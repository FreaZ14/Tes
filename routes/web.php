<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\FormController;

// Route untuk menampilkan form
Route::get('/user/create', [UserController::class, 'create']);

// Route untuk menyimpan data
Route::post('/user/store', [UserController::class, 'store']);



// Route untuk menampilkan form
Route::get('/form', [FormController::class, 'showForm']);

// Route untuk menangani submit form
Route::post('/form/submit', [FormController::class, 'handleForm']);

