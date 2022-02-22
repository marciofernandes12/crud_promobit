<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TagController;


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

Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes();
Route::group(['prefix' => 'products'], function () {
    Route::get('/', [ProductController::class, 'index'])->name('products@view');
    Route::get('/form', [ProductController::class, 'create']);
    Route::post('/form', [ProductController::class, 'store'])->name('products@store');
    Route::get('/update/{id}', [ProductController::class, 'edit'])->name('products@edit');
    Route::post('/update/{id}', [ProductController::class, 'update'])->name('products@update');
    Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('products@destroy');
});
Route::group(['prefix' => 'tags'], function () {
    Route::get('/', [TagController::class, 'index'])->name('tags@view');
    Route::get('/form', [TagController::class, 'create']);
    Route::post('/form', [TagController::class, 'store'])->name('tags@store');
    Route::get('/update/{id}', [TagController::class, 'edit'])->name('tags@edit');
    Route::post('/update/{id}', [TagController::class, 'update'])->name('tags@update');
    Route::get('/delete/{id}', [TagController::class, 'destroy'])->name('tags@destroy');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
