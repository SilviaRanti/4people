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

// route untuk user
Route::get('/', function () {
    return view('user.home');
})->name('user.home');

Route::get('/about', function () {
    return view('user.about');
})->name('user.about');

Route::get('/pricing', function () {
    return view('user.pricing');
})->name('user.pricing');

Route::get('/contact', function () {
    return view('user.contact');
})->name('user.contact');

