<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route ke URL '/hello' yang menampilkan data pada view
Route::view('/hello', 'hello', ['data' => 'Hello ppl']);

// Route ke URL '/hello-again' dengan parameter data 'name'
Route::view('/hello-again', 'hello', ['data' => ['name' => 'Farhan']]);

// Route dengan parameter 'id' untuk menampilkan produk tertentu
Route::get('/products/{id}', function ($id) {
    return "Product ID: " . $id;
});

// Route dengan parameter 'id' untuk kategori
Route::get('/categories/{id}', function ($id) {
    return "Category ID: " . $id;
})->where('id', '[0-9]+');

// Route dengan parameter 'userId' dan nilai default '404'
Route::get('/users/{id?}', function ($userId = '404') {
    return "User ID: " . $userId;
});

Route::get('/cookie/set', [App\Http\Controllers\CookieController::class, 'createCookie']);

Route::get('/redirect/from', [App\Http\Controllers\RedirectController::class, 'redirectFrom']);
Route::get('/redirect/to', [App\Http\Controllers\RedirectController::class, 'redirectTo']);
Route::get('/redirect/name', [App\Http\Controllers\RedirectController::class, 'redirectName']);
Route::get('/redirect/name/{name}', [App\Http\Controllers\RedirectController::class, 'redirectHello'])
    ->name('redirect-hello');

Route::get('/input/hello', [App\Http\Controllers\InputController::class, 'hello']);
Route::post('/input/hello', [App\Http\Controllers\InputController::class, 'hello']);
Route::post('/input/hello/first', [App\Http\Controllers\InputController::class, 'hello']);
Route::post('/input/type', [App\Http\Controllers\InputController::class, 'InputType']);
Route::post('/input/only', [App\Http\Controllers\InputController::class, 'filterOnly']);
Route::post('/input/except', [App\Http\Controllers\InputController::class, 'filterExcept']);

Route::get('/middleware/api', function (){
    return "OK";
})->middleware([\App\Http\Middleware\ContohMiddleware::class]);

Route::get('response/hello', [App\Http\Controllers\ResponseController::class, 'response']);
Route::get('response/header', [App\Http\Controllers\ResponseController::class, 'header']);

Route::post('file/upload', [App\Http\Controllers\FileController::class, 'upload']);

Route::get('/controller/hello', [App\Http\Controllers\HelloController::class, 'hello']);