<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Auth;

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
})->middleware('auth:customer');

// PRODUCT
//  - Index
Route::get('/category/{category:cod}', [ProductController::class, 'index'])
    ->middleware('auth:customer');

//  - Show
Route::get('/product/{product:cod}', [ProductController::class, 'show'])
    ->middleware('auth:customer');


// CUSTOMER
// - Show
Route::get('/profile', [CustomerController::class, 'show'])
    ->middleware('auth:customer');

// - Login
Route::get('/login', [CustomerController::class, 'login'])
    ->name('login')
    ->middleware('guest:customer');

// - Authenticate
Route::post('/login', [CustomerController::class, 'authenticate']);

// - Logout
Route::get('/logout', [CustomerController::class, 'logout']);

// - Create
Route::get('/signin', [CustomerController::class, 'create'])
    ->middleware('guest:customer');

// - Store
Route::post('/signin', [CustomerController::class, 'store']);
