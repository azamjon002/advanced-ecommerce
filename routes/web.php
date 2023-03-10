<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect', [\App\Http\Controllers\HomeController::class, 'redirect'])->name('redirect');

Route::resource('category', '\App\Http\Controllers\CategoryController');
Route::resource('product', '\App\Http\Controllers\ProductController');


//Product for User
Route::get('/product/details/{id}', [\App\Http\Controllers\HomeController::class, 'product_details'])->name('product_details');
