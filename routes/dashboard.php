<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\roleController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'role:admin']], function () {

    Route::get('/', function () {
        dd('hello');
    });

    Route::resources(
        [
            'products' => ProductController::class,
            'categories' => CategoryController::class,
            'roles' => roleController::class,
            'users' => UserController::class,
            'sales' => SaleController::class,
        ]
    );
});
