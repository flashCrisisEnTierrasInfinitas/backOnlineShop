<?php

use App\Http\Controllers\Api\CategoryProdutController;
use App\Http\Controllers\Api\ImageUploadController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//!
//!|--------------------------------------------------------------------------
//!| API Routes
//!|--------------------------------------------------------------------------
//!|
//!| Here is where you can register API routes for your application. These
//!| routes are loaded by the RouteServiceProvider within a group which
//!| is assigned the "api" middleware group. Enjoy building your API!
//!|

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(CategoryProdutController::class)->group(function () {
    Route::get('/categoryProd', 'index');
    Route::post('/categoryProd', 'store');
    Route::get('/categoryProd/{id}', 'show');
    Route::put('/categoryProd/{id}', 'update');
    Route::delete('/categoryProd/{id}', 'destroy');
});


Route::controller(ProductController::class)->group(function () {
    Route::get('/product', 'index');
    Route::post('/product', 'store');
    Route::get('/product/{id}', 'show');
    Route::put('/product/{id}', 'update');
    Route::delete('/product/{id}', 'destroy');
});

Route::controller(UsuarioController::class)->group(function () {
    Route::get('/users', 'index');
    Route::post('/users', 'store');
    Route::get('/users/{id}', 'show');
    Route::put('/users/{id}', 'update');
    Route::delete('/users/{id}', 'destroy');
});

Route::controller(ImageUploadController::class)->group(function () {
    Route::post('/upload', 'upload');
});
