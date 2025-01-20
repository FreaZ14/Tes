<?php

use App\Http\Controllers\UserController;

// Route untuk menampilkan form
Route::get('/user/create', [UserController::class, 'create']);

// Route untuk menyimpan data
Route::post('/user/store', [UserController::class, 'store']);
