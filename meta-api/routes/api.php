<?php

use App\Http\Controllers\Api\Category\CategoryController;
use App\Http\Controllers\Api\Category\SubCategoryController;
use App\Http\Controllers\Api\Product\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::group(['prefix' => 'v1', 'namespace' => 'Api'], function () {
    Route::prefix('category')->namespace('Category')->group(function () {
        Route::get('/list/{id}', [CategoryController::class, 'index']);
        Route::get('/list', [CategoryController::class, 'list']);
        Route::get('/listSubCategory/{id}', [SubCategoryController::class, 'index']);
        Route::post('/create', [CategoryController::class, 'create']);
        Route::post('/createSubCategory', [SubCategoryController::class, 'create']);
    });
    Route::prefix('product')->namespace('Product')->group(function () {
        Route::post('/create', [ProductController::class, 'create']);
        Route::post('/search', [ProductController::class, 'search']);
        Route::post('/update', [ProductController::class, 'update']);
        Route::get('/list', [ProductController::class, 'list']);
        Route::get('/view/{id}', [ProductController::class, 'view']);
        Route::get('/delete/{id}', [ProductController::class, 'delete']);
    });
});
