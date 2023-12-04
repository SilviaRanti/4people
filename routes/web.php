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

// user route
Route::prefix('/')->name('user.')->group(function () {
    Route::get('/', function () {
        return view('user.home');
    })->name('home');

    // About route
    Route::get('about', function () {
        return view('user.about');
    })->name('about');

    // Pricing route
    Route::get('pricing', function () {
        return view('user.pricing');
    })->name('pricing');

    // Contact route
    Route::get('contact', function () {
        return view('user.contact');
    })->name('contact');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('home');
});
