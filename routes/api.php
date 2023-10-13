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


Route::controller(ImageUploadController::class)->group(function () {
    Route::post('/upload', 'upload');
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('me', 'App\Http\Controllers\AuthController@me');
    Route::post('register', 'App\Http\Controllers\AuthController@register');
});

Route::middleware('auth:api')->group(function () {
    // Rutas protegidas

    Route::controller(UsuarioController::class)->group(function () {
        Route::get('/users', 'index');
        Route::post('/users', 'store');
        Route::get('/users/{id}', 'show');
        Route::put('/users/{id}', 'update');
        Route::delete('/users/{id}', 'destroy');
    });


    Route::controller(ProductController::class)->group(function () {
        Route::post('/product', 'store');
        Route::put('/product/{id}', 'update');
        Route::delete('/product/{id}', 'destroy');
    });

    Route::controller(CategoryProdutController::class)->group(function () {
        Route::get('/categoryProd', 'index');
        Route::post('/categoryProd', 'store');
        Route::get('/categoryProd/{id}', 'show');
        Route::put('/categoryProd/{id}', 'update');
        Route::delete('/categoryProd/{id}', 'destroy');
    });
});

Route::get('/product', 'App\Http\Controllers\Api\ProductController@index');
Route::get('/product/{id}', 'App\Http\Controllers\Api\ProductController@show');
Route::get('/categoryProd', 'App\Http\Controllers\Api\CategoryProdutController@index');
Route::get('/categoryProd/{id}', 'App\Http\Controllers\Api\CategoryProdutController@show');
