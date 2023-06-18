<?php

use App\Http\Controllers\ProductController;
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
    return view('home');
});

// PRODUCT
//  - Index
Route::get('/category/{category:cod}', [ProductController::class, 'index']);

//  - Show
Route::get('/product/{product:cod}', [ProductController::class, 'show']);
