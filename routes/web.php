<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminHeroController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\User\UserHomeController;
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
    Route::get('/', [UserHomeController::class, 'index'])->name('home');

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
    Route::get('login', [AdminAuthController::class, 'index'])->name('login.view');
    Route::post('login', [AdminAuthController::class, 'procesLogin'])->name('procesLogin');
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');


    Route::middleware(['checkRole:1,2'])->group(function () {
        Route::get('dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::resource('user', AdminUserController::class);
        Route::resource('hero', AdminHeroController::class);
    });
});
