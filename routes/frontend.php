<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\GalleryController;
use App\Http\Controllers\Frontend\VideoController;
use App\Http\Controllers\Frontend\StoreController;
use App\Http\Controllers\Frontend\PageController;

// ============================================================
// FRONTEND ROUTES — Washingtone Oruko Portfolio
// ============================================================


// -------------------
// HOME
// -------------------
Route::get('/', [HomeController::class, 'index'])->name('home');


// -------------------
// BIOGRAPHY
// -------------------
Route::get('/biography', [PageController::class, 'biography'])->name('biography');


// -------------------
// SERVICES
// -------------------
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');


// -------------------
// RATE CARD
// -------------------
Route::get('/rate-card', [PageController::class, 'rateCard'])->name('rate-card');


// -------------------
// STORE / MY BOOK
// -------------------
Route::get('/store', [StoreController::class, 'index'])->name('store.index');
Route::get('/store/{slug}', [StoreController::class, 'show'])->name('store.show');
Route::post('/store/{slug}/order', [StoreController::class, 'order'])->name('store.order');
Route::get('/store/order/success', [StoreController::class, 'orderSuccess'])->name('store.order.success');


// -------------------
// VIDEOS
// -------------------
Route::get('/videos', [VideoController::class, 'index'])->name('videos.index');


// -------------------
// GALLERY
// -------------------
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');


// -------------------
// BLOG
// -------------------
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');


// -------------------
// GET IN TOUCH / CONTACT
// -------------------
Route::get('/get-in-touch', [ContactController::class, 'index'])->name('contact.index');
Route::post('/get-in-touch', [ContactController::class, 'store'])->name('contact.store');


// -------------------
// LEGAL PAGES
// -------------------
Route::get('/privacy-policy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/terms-conditions', [PageController::class, 'terms'])->name('terms');
