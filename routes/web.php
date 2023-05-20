<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes([
    'register' => false,
    'reset' => false
]);


Route::middleware(['auth'])->group(function(){

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('products', App\Http\Controllers\ProductController::class);

    Route::prefix('categories')->controller(App\Http\Controllers\CategoryController::class)->group(function(){
        Route::get('', 'index');
        Route::post('store', 'store');
    });

    Route::prefix('sales')->controller(App\Http\Controllers\SaleController::class)->as('sales.')->group(function(){
        Route::get('{product_id}', 'index');
        Route::post('{product_id}/store', 'store')->name('store');
    });
});
