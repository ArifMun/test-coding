<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ViewProductController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductController::class, 'getData']);
Route::get('/products/{id}', [ProductController::class, 'detail']);
Route::post('/products', [ProductController::class, 'store'])->withoutMiddleware(VerifyCsrfToken::class);
Route::put('/products/{id}', [ProductController::class, 'update'])->withoutMiddleware(VerifyCsrfToken::class);
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->withoutMiddleware(VerifyCsrfToken::class);

Route::get('/index', [ViewProductController::class, 'index']);