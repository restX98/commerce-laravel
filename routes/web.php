<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;

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

//  - Search
Route::get('/search', [ProductController::class, 'search'])
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


// CART
//  - Show
Route::get('/cart', [CartController::class, 'show'])
    ->middleware('auth:customer');

// - Add Product
Route::post('/cart/add-product', [CartController::class, 'addProduct'])
    ->middleware('auth:customer');

// - Add To Cart
Route::post('/cart/remove-product', [CartController::class, 'removeProduct'])
    ->middleware('auth:customer');


// CHECKOUT
// - Show
Route::get('/checkout', [CheckoutController::class, 'show'])
    ->middleware('auth:customer');

// - Place Order
Route::post('/checkout/place-order', [CheckoutController::class, 'placeOrder'])
    ->middleware('auth:customer');


// ORDER
// -ThankyouPage
Route::get('/thankyou', [OrderController::class, 'thankyou'])
    ->middleware('auth:customer');
