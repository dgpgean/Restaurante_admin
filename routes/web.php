<?php

use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Categories\CategoryController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::prefix('categories/')->group(function () {
    Route::get('all', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('all', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('new', [CategoryController::class, 'new'])->name('categories.new');
    Route::post('new', [CategoryController::class, 'store'])->name('categories.store');
    Route::delete('delete/{id}', [CategoryController::class, 'remove'])->name('categories.delete');
});

Route::prefix('products/')->group(function () {
    Route::get('all', [ProductController::class, 'index'])->name('products.index');
    Route::post('all', [ProductController::class, 'index'])->name('products.index');
    Route::get('new', [ProductController::class, 'new'])->name('products.new');
    Route::post('new', [ProductController::class, 'store'])->name('products.store');
});
