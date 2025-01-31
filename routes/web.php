<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('pzn', function () {
    return "Hello Farhan";
});

Route::redirect('/youtube', '/pzn');

Route::get('/cookie/set', [App\Http\Controllers\CookieController::class, 'createCookie']);

Route::get('/redirect/from', [App\Http\Controllers\RedirectController::class, 'redirectFrom']);
Route::get('/redirect/to', [App\Http\Controllers\RedirectController::class, 'redirectTo']);
Route::get('/redirect/name', [App\Http\Controllers\RedirectController::class, 'redirectName']);
Route::get('/redirect/name/{name}', [App\Http\Controllers\RedirectController::class, 'redirectHello'])
    ->name('redirect-hello');
Route::get('redirect/named', function () {
    //return route('redirect-hello', ['name' => 'Farhan']);
    //return url()->route('redirect-hello', ['name' => 'Farhan']);
    return \Illuminate\Support\Facades\URL::route('redirect-hello', ['name' => 'Farhan']);
});

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

Route::prefix("/response/type")->group(function () {
Route::get('/view', [App\Http\Controllers\ResponseController::class, 'view']);
Route::get('/json', [App\Http\Controllers\ResponseController::class, 'responseJson']);
Route::get('/file', [App\Http\Controllers\ResponseController::class, 'responseFile']);
Route::get('/download', [App\Http\Controllers\ResponseController::class, 'responseDownload']);
});

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

Route::view('/hello', 'hello', ['name' => 'Farhan']);

Route::get('/hello-again', function (){
    return view('hello', ['name' => 'Farhan']);
});

Route::get('/hello-world', function (){
    return view('hello.world', ['name' => 'Farhan']);
});

 Route::get('/form', [App\Http\Controllers\FormController::class, 'form']);
 Route::post('/form', [App\Http\Controllers\FormController::class, 'submitForm']);

Route::get('url/current', function () {
    return \Illuminate\Support\Facades\URL::full();
});

 Route::middleware(['contoh:PZN,401'])->group(function () {
    Route::get('/middleware/api', function () {
        return "OK";
    });
    Route::get('/middleware/group', function () {
        return "GROUP";
    });
 });

 Route::get('/session/create', [App\Http\Controllers\SessionController::class, 'createSession']);
 Route::get('/session/get', [App\Http\Controllers\SessionController::class, 'getSession']);

 Route::get('/error/sample', function () {
    throw new Exception("Sample Error");
 });
 Route::get('/error/manual', function () {
     report(new Exception("Manual Error"));
     return "OK";
 });
 Route::get('/error/validation', function () {
    throw new \App\Exceptions\ValidationException("Validation Error");
 });

 Route::get('/abort/400', function () {
    abort(400, "weh error ternyata");
 });

 Route::get('/abort/401', function () {
    abort(401);
 });

 Route::get('/abort/500', function () {
    abort(500);
 });