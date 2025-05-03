<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FaqsController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductInfoController;
use App\Http\Controllers\PromocodeController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WebsiteController::class, 'index'])->name('home');
Route::get('/productdetails/{id}', [WebsiteController::class, 'productDetails'])->name('product_details');
// Route::get('/products', [WebsiteController::class, 'products'])->name('products');
Route::get('/products/{category}', [WebsiteController::class, 'category'])->name('category');
Route::get('/products/{category}/{subCategory}', [WebsiteController::class, 'subCategory'])->name('products-by-sub-category');
Route::get('/about-us', [WebsiteController::class, 'aboutus'])->name('about-us');
Route::get('/contact-us', [WebsiteController::class, 'contactus'])->name('contact-us');
Route::get('/FAQs', [WebsiteController::class, 'FAQs'])->name('FAQs');
Route::get('/track-order', [WebsiteController::class, 'trackorder'])->name('track-order');
Route::get('/order-status', [WebsiteController::class, 'orderstatus'])->name('order-status');

Route::post('/add-to-cart', [CartController::class, 'addToCart']);
Route::get('/cart', [CartController::class, 'getCart'])->name('cart');
Route::post('/delete-from-cart', [CartController::class, 'deleteFromCart']);
Route::get('/promocodeExists', [CartController::class, 'promocode'])->name('promocode');


Route::middleware('auth')->group(function () {
    Route::get('category/search', [CategoryController::class, 'search'])->name('category.search');
    Route::get('subcategory/search', [SubCategoryController::class, 'search'])->name('subcategory.search');
    Route::get('promocode/search', [PromocodeController::class, 'search'])->name('promocode.search');
    Route::get('product/search', [ProductController::class, 'search'])->name('product.search');
    Route::view('/admin', 'index')->name('CMS');
    Route::resource('product', ProductController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('category.subcategory', SubCategoryController::class);
    Route::resource('promocode', PromocodeController::class);
    Route::resource('size', SizeController::class);
    Route::resource('product.info', ProductInfoController::class);
    Route::resource('slider', SliderController::class);
    Route::resource('settings', SettingsController::class);
    Route::resource('faqs', FaqsController::class);
    Route::resource('order', OrderController::class);
    Route::resource('message', MessageController::class)->except('store');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
Route::resource('message', MessageController::class)->only('store');
Route::view('/login', 'auth.login')->name('login');


Route::post('/login', [AuthController::class, 'login']);
