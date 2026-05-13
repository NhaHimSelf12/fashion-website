<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;

use App\Http\Controllers\AuthController;

Route::get('/', [ShopController::class, 'index'])->name('home');
Route::get('/shop', [ShopController::class, 'shop'])->name('shop');
Route::get('/category', [ShopController::class, 'category'])->name('category');
Route::get('/category/{id}', [ShopController::class, 'showCategory'])->name('category.show');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ShopController::class, 'profile'])->name('profile');
    Route::post('/profile/update', [ShopController::class, 'updateProfile'])->name('profile.update');
    Route::get('/cart', [ShopController::class, 'cart'])->name('cart');
    Route::post('/cart/add', [ShopController::class, 'addToCart'])->name('cart.add');
    Route::post('/checkout', [ShopController::class, 'checkout'])->name('checkout');
    Route::get('/success', [ShopController::class, 'success'])->name('success');
});

// Admin Routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('categories', App\Http\Controllers\AdminCategoryController::class);
    Route::resource('products', App\Http\Controllers\AdminProductController::class);
    Route::get('/reports', [App\Http\Controllers\AdminController::class, 'reports'])->name('reports');
    Route::get('/reports/print', [App\Http\Controllers\AdminController::class, 'printReport'])->name('reports.print');
    Route::get('/settings', [App\Http\Controllers\AdminController::class, 'settings'])->name('settings');
    Route::post('/settings/update-khqr', [App\Http\Controllers\AdminController::class, 'updateKhqr'])->name('settings.updateKhqr');
});

// Deployment Route (Temporary)
Route::get('/run-migrations', function () {
    try {
        \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
        return 'Migrations executed successfully! <br><a href="/">Go back to Home</a>';
    } catch (\Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
});
