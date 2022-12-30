<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Site\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::group(
    ['prefix' => '', 'controller' => CartController::class],
    function () {
        Route::get('/', 'index')->name('index');
        Route::get('cart', 'cart')->name('cart');
        Route::get('add-to-cart/{id}', 'addToCart')->name('add.to.cart');
        Route::patch('update-cart', 'update')->name('update.cart');
        Route::delete('remove-from-cart', 'remove')->name('remove.from.cart');
    }
);
