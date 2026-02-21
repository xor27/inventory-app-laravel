<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserProfileController;

/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect()->route('dashboard');
});

/*
|--------------------------------------------------------------------------
| DASHBOARD (ALL AUTH)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| CATEGORY (ADMIN ONLY)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('categories', CategoryController::class);
});

/*
|--------------------------------------------------------------------------
| PRODUCT (ALL ROLE VIEW, ADMIN CRUD)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // ===== ADMIN ONLY (HARUS DI ATAS) =====
    Route::get('/products/create', [ProductController::class, 'create'])
        ->middleware('role:admin')
        ->name('products.create');

    Route::post('/products', [ProductController::class, 'store'])
        ->middleware('role:admin')
        ->name('products.store');

    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])
        ->middleware('role:admin')
        ->name('products.edit');

    Route::put('/products/{product}', [ProductController::class, 'update'])
        ->middleware('role:admin')
        ->name('products.update');

    Route::delete('/products/{product}', [ProductController::class, 'destroy'])
        ->middleware('role:admin')
        ->name('products.destroy');

    // ===== ALL AUTH =====
    Route::get('/products', [ProductController::class, 'index'])
        ->name('products.index');

    // ⚠️ SHOW PALING BAWAH
    Route::get('/products/{product}', [ProductController::class, 'show'])
        ->name('products.show');
});

/*
|--------------------------------------------------------------------------
| TRANSACTION (USER ONLY)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/transactions', [TransactionController::class, 'index'])
        ->name('transactions.index');

    Route::get('/transactions/create', [TransactionController::class, 'create'])
        ->name('transactions.create');

    Route::post('/transactions', [TransactionController::class, 'store'])
        ->name('transactions.store');
});

/*
|--------------------------------------------------------------------------
| PROFILE USER (USER ONLY)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/profile', [UserProfileController::class, 'edit'])
        ->name('user.profile.edit');

    Route::post('/user/profile', [UserProfileController::class, 'update'])
        ->name('user.profile.update');
});

/*
|--------------------------------------------------------------------------
| DEFAULT PROFILE (BREEZE)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';