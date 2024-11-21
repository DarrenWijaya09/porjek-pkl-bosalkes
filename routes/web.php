<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\ContactsController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Middleware\CheckEmailDomain;

// Redirect root to dashboard
Route::get('/', function () {
    return redirect()->route('dashboard'); // Mengarahkan / ke /dashboard
});

// Rute untuk dashboard yang bisa diakses tanpa login
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Rute lain terkait dashboard
Route::get('/dashboard/category/{categoryName}', [DashboardController::class, 'showByCategoryName'])->name('dashboard.category.byCategoryName');
Route::get('/dashboard/category/id/{id}', [DashboardController::class, 'showByCategoryId'])->name('dashboard.category.byCategoryId');
Route::get('/dashboard/all', [DashboardController::class, 'show'])->name('dashboard.all');

// Resource routes for products
Route::resource('products', ProductController::class);
Route::get('/products/all', [ProductController::class, 'showAll'])->name('products.all');
Route::get('/products/category/name/{category}', [ProductController::class, 'showByCategoryName'])->name('products.category.name');
Route::get('/products/category/id/{id}', [ProductController::class, 'showByCategoryId'])->name('products.category.id');
Route::get('/product/details/{id}', [ProductController::class, 'showProductDetails'])->name('products.details');
Route::get('/products', [ProductController::class, 'show'])->name('products.index');

// Rute untuk about dan contact
Route::resource('about', AboutController::class);
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::resource('contact', ContactController::class)
    ->only(['index', 'store'])
    ->names([
        'store' => 'contact.send', // Aliaskan rute store menjadi contact.send
    ]);

// Admin Routes (Only for users with specific email domains)
Route::prefix('admin')->name('admin.')->middleware(['auth', CheckEmailDomain::class])->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('product', ProductsController::class);
    Route::resource('contacts', ContactsController::class);
});

// Authenticated profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Include auth routes
require __DIR__.'/auth.php';
