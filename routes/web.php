<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Seller\SellerController;
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

/*--------------------- Admin Route ------------------------------------------------ */

Route::prefix('admin')->group(function () {

    Route::get('/login', [AdminController::class, 'Index'])->name('login_form');

    Route::post('/login/owner', [AdminController::class, 'Login'])->name('admin.login');

    Route::get('/dashboard', [AdminController::class, 'Dashboard'])->name('admin.dashboard')->middleware('isAdmin');

    // logout
    Route::get('/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

    // register - render
    Route::get('/register', [AdminController::class, 'AdminRegister'])->name('admin.register');

    // register - store
    Route::post('/register/store', [AdminController::class, 'store'])->name('admin.store');
});

/* ----------------  End of Admin Route  ------------- */








/*------------------- Seller Route -------------------*/

Route::prefix('seller')->group(function () {

    Route::get('/login', [SellerController::class, 'index'])->name('seller_login_form');

    Route::post('/login/owner', [SellerController::class, 'Login'])->name('seller.login');

    Route::get('/dashboard', [SellerController::class, 'dashboard'])->name('seller.dashboard')->middleware('isSeller');

    // logout
    Route::get('/logout', [SellerController::class, 'logout'])->name('seller.logout');

    // register - render
    Route::get('/register', [SellerController::class, 'register'])->name('seller.register');

    // register - store
    Route::post('/register/store', [SellerController::class, 'store'])->name('seller.store');
});



/*-------------------End of  Seller Route -------------------*/











Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
