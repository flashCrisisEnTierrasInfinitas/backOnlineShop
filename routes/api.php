<?php

use App\Http\Controllers\Api\CategoryProdutController;
use App\Http\Controllers\Api\ImageUploadController;
use App\Http\Controllers\Api\MyDalys;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UsuarioController;
use App\Http\Controllers\Api\VentasController;
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
    //ok solo falta las img
    Route::controller(UsuarioController::class)->group(function () {
        Route::get('/users', 'index');
        Route::post('/users', 'store');
        Route::get('/users/{id}', 'show');
        Route::put('/users/{id}', 'update');
        Route::post('/usersDelete/{id}', 'destroy');
    });

//ok
    Route::controller(ProductController::class)->group(function () {
        Route::post('/product', 'store');
        Route::put('/product/{id}', 'update');
        Route::post('/productStatus/{id}', 'destroy');
    });
    //OK solo falta img 
    Route::controller(CategoryProdutController::class)->group(function () {
        Route::post('/categoryProd', 'store');
        Route::put('/categoryProd/{id}', 'update');
        Route::post('/categoryState/{id}', 'destroy');
    });

    Route::controller(MyDalys::class)->group(function () {
        Route::get('/mydaly', 'index');
        Route::post('/mydaly', 'store');
    });
    Route::controller(VentasController::class)->group(function () {
        Route::get('/ventas', 'index');
        Route::post('/ventas', 'store');
        Route::get('/listOneVenta/{id}', 'listOneVenta');
        Route::get('/listAllventasStatus/{id}', 'listAllventasStatus');
    });
});

Route::get('/product', 'App\Http\Controllers\Api\ProductController@index');
Route::get('/listActiveProduct', 'App\Http\Controllers\Api\ProductController@listActiveProducts');
Route::get('/producOferta', 'App\Http\Controllers\Api\ProductController@producOferta');
Route::get('/product/{id}', 'App\Http\Controllers\Api\ProductController@show');
Route::get('/listCategoriPro/{id}', 'App\Http\Controllers\Api\ProductController@listCategoriPro');
Route::get('/categoryProd', 'App\Http\Controllers\Api\CategoryProdutController@index');
Route::get('/listActiveCategory', 'App\Http\Controllers\Api\CategoryProdutController@listActiveCategory');
Route::get('/categoryProd/{id}', 'App\Http\Controllers\Api\CategoryProdutController@show');
//TOCA PROTEGERLAS
Route::get('/ventasProductos/{id}', 'App\Http\Controllers\Api\VentaProductosController@index');
Route::post('/ventasProductos/{user}', 'App\Http\Controllers\Api\VentaProductosController@show');
Route::put('/ventas/{id}', 'App\Http\Controllers\Api\VentasController@update');
Route::get('/ventas/{user}', 'App\Http\Controllers\Api\VentasController@show');

