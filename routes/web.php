<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::controller(ApplicationController::class)->group(function (){
    Route::get('/applications','index')->name('applications');
    Route::get('/applications/create', 'create')->name('applications.create');
    Route::post('/applications', 'store')->name('applications.store');
});

Route::controller(ProductController::class)->group(function (){
    Route::get('/products','index')->name('products');
    Route::get('/products/create', 'create')->name('products.create');
    Route::post('/products', 'store')->name('products.store');
});

