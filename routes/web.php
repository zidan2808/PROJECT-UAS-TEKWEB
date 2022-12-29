<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;





//front-page
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('homepage');
Route::get('/shop/{slug?}', [\App\Http\Controllers\ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/tag/{slug?}', [\App\Http\Controllers\ShopController::class, 'tag'])->name('shop.tag');
Route::get('/product/{product:slug}', [\App\Http\Controllers\ShowController::class, 'show'])->name('product.show');
Route::get('/checkout', [\App\Http\Controllers\OrderController::class, 'process'])->name('checkout.process');
Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'contact'])->name('contact.index');
Route::resource('/cart', \App\Http\Controllers\CartController::class);

// react route
Route::get('/products', [\App\Http\Controllers\HomeController::class, 'get_products']);

//back-page
Route::group(['middleware' => ['isAdmin'], 'as' => 'admin.'], function () {
});

Route::get('/admin', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::resource('/categories', \App\Http\Controllers\CategoryController::class);
Route::post('/categories/image', [\App\Http\Controllers\CategoryController::class, 'storeImage'])->name('categories.storeImage');

Route::resource('/tags', \App\Http\Controllers\TagController::class);

Route::resource('/products', \App\Http\Controllers\ProductController::class);
Route::post('/products/image', [\App\Http\Controllers\ProductController::class, 'storeImage'])->name('products.storeImage');


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
