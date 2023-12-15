<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminBookingController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminHeroController;
use App\Http\Controllers\Admin\AdminLatestWorkController;
use App\Http\Controllers\Admin\AdminPembayaranController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\Admin\AdminSettingsController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\User\UserBookingController;
use App\Http\Controllers\User\UserHomeController;
use App\Http\Controllers\User\UserPricingController;
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
    Route::get('pricing', [UserPricingController::class, 'index'])->name('pricing');

    // Booking route
    Route::post('/booking', [UserBookingController::class, 'store'])->name('booking');

    // Contact route
    Route::get('contact', function () {
        return view('user.contact');
    })->name('contact');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AdminAuthController::class, 'index'])->name('login.view');
    Route::post('login', [AdminAuthController::class, 'procesLogin'])->name('procesLogin');
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');


    Route::middleware(['checkRole:1'])->group(function () {
        Route::resource('user', AdminUserController::class);
    });

    Route::middleware(['checkRole:1,2'])->group(function () {
        Route::resource('dashboard', AdminDashboardController::class);

        Route::get('/getBookings', [AdminBookingController::class, 'getBookings']);


        Route::resource('hero', AdminHeroController::class);
        Route::resource('latest-works', AdminLatestWorkController::class);
        Route::resource('packages', AdminServiceController::class);
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('settings', AdminSettingsController::class);
        Route::resource('bookings', AdminBookingController::class);
        Route::resource('pembayaran', AdminPembayaranController::class);
    });
});
