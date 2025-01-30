<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route ke URL '/hello' yang menampilkan data pada view
Route::view('/hello', 'hello', ['data' => 'Hello ppl']);

// Route ke URL '/hello-again' dengan parameter data 'name'
Route::view('/hello-again', 'hello', ['data' => ['name' => 'Farhan']]);

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

Route::get('/controller/hello/{name}', [App\Http\Controllers\HelloController::class, 'hello']);

Route::get('/products/{id}', function ($productId) {
    return "Products : " . $productId;
})->name('product.detail');

Route::get('/products/{productId}/items/{itemId}', function ($productId, $itemId) {
    return "Products : " . $productId . ", Items : " . $itemId;
})->name('product.item.detail');

Route::get('/categories/{id}', function (string $categoryId) {
    return "Categories : " . $categoryId;
})->where('id', '[0-9]+')->name('categories.detail');

Route::get('/users/{id?}', function (string $userId = '404') {
    return "Users : " . $userId;
})->name('users.detail'); 

Route::get('/produk/{id}', function ($Id) {
    $link = route ('product.detail', ['id' => $Id]);
    return "Link : " . $link;
});

Route::get('/produk-redirect/{id}', function ($Id) {
    return redirect()->route('product.detail', ['id' => $Id]);
});

Route::get('/products/{id}', function ($productId) {
    return "Products $productid";
});

Route::get('/products/{product}/items/{item}', function ($productId, $itemId) {
    return "Products $productid, Item $itemId";
});

