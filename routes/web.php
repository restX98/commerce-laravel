<?php

use App\Models\User;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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


// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listign
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing

Route::get('/', [ListingController::class, 'index']);

Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

Route::get('/listing/{listing}', [ListingController::class, 'show'])->where('listing', '[0-9]+');

Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

Route::get('/register', [UserController::class, 'create'])->middleware('guest');

Route::post('/users', [UserController::class, 'store']);

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

Route::post('/users/authehticate', [UserController::class, 'authehticate']);

// Route::get('/listing/{id}', function($id) {
//     $listing = Listing::find($id);
//     if($listing) {
//         return view("listing", [
//             'listing' => $listing
//         ]);
//     } else {
//         abort('404');
//     }
    
// })->where('id', '[0-9]+');