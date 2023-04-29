<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\SearchController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\HomeController;
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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/categories', [HomeController::class, 'getCategory']);

Route::prefix('admin')->group(function () {
    Route::delete('/brands', [BrandController::class, 'deleteMany']);

    Route::apiResources([
        'brands' => BrandController::class,
        'categories' => CategoryController::class,
        'users' => UserController::class,
    ]);

    Route::get('/search', [SearchController::class, 'search']);
});
