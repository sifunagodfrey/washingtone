<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\RateCardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\VideosController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\BlogsController;
use App\Http\Controllers\Admin\BlogCategoriesController;
use App\Http\Controllers\Admin\ContactMessagesController;
use App\Http\Controllers\Admin\PageContentController;
use App\Http\Controllers\Admin\SettingsController;

// ============================================================
// ADMIN ROUTES — Washingtone Oruko Portfolio
// ============================================================

Route::middleware(['auth', 'admin'])
    ->prefix(config('admin.prefix', 'admin'))
    ->name('admin.')
    ->group(function () {


        // -------------------
        // DASHBOARD
        // -------------------
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


        // -------------------
        // USERS (Admin management)
        // -------------------
        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/',          [UsersController::class, 'index'])->name('index');
            Route::get('/create',    [UsersController::class, 'create'])->name('create');
            Route::post('/',         [UsersController::class, 'store'])->name('store');
            Route::get('/{id}',      [UsersController::class, 'show'])->name('show');
            Route::get('/{id}/edit', [UsersController::class, 'edit'])->name('edit');
            Route::put('/{id}',      [UsersController::class, 'update'])->name('update');
            Route::delete('/{id}',   [UsersController::class, 'destroy'])->name('destroy');
        });


        // -------------------
        // SERVICES
        // -------------------
        Route::prefix('services')->name('services.')->group(function () {
            Route::get('/',          [ServicesController::class, 'index'])->name('index');
            Route::get('/create',    [ServicesController::class, 'create'])->name('create');
            Route::post('/',         [ServicesController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [ServicesController::class, 'edit'])->name('edit');
            Route::put('/{id}',      [ServicesController::class, 'update'])->name('update');
            Route::delete('/{id}',   [ServicesController::class, 'destroy'])->name('destroy');
        });


        // -------------------
        // RATE CARD PACKAGES
        // -------------------
        Route::prefix('rate-card')->name('rate-card.')->group(function () {
            Route::get('/',          [RateCardController::class, 'index'])->name('index');
            Route::get('/create',    [RateCardController::class, 'create'])->name('create');
            Route::post('/',         [RateCardController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [RateCardController::class, 'edit'])->name('edit');
            Route::put('/{id}',      [RateCardController::class, 'update'])->name('update');
            Route::delete('/{id}',   [RateCardController::class, 'destroy'])->name('destroy');
        });


        // -------------------
        // GALLERY
        // -------------------
        Route::prefix('gallery')->name('gallery.')->group(function () {
            Route::get('/',          [GalleryController::class, 'index'])->name('index');
            Route::get('/create',    [GalleryController::class, 'create'])->name('create');
            Route::post('/',         [GalleryController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [GalleryController::class, 'edit'])->name('edit');
            Route::put('/{id}',      [GalleryController::class, 'update'])->name('update');
            Route::delete('/{id}',   [GalleryController::class, 'destroy'])->name('destroy');
        });


        // -------------------
        // VIDEOS (YouTube)
        // -------------------
        Route::prefix('videos')->name('videos.')->group(function () {
            Route::get('/',          [VideosController::class, 'index'])->name('index');
            Route::get('/create',    [VideosController::class, 'create'])->name('create');
            Route::post('/',         [VideosController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [VideosController::class, 'edit'])->name('edit');
            Route::put('/{id}',      [VideosController::class, 'update'])->name('update');
            Route::delete('/{id}',   [VideosController::class, 'destroy'])->name('destroy');
        });


        // -------------------
        // STORE (Products / Books)
        // -------------------
        Route::prefix('store')->name('store.')->group(function () {
            Route::get('/',          [StoreController::class, 'index'])->name('index');
            Route::get('/create',    [StoreController::class, 'create'])->name('create');
            Route::post('/',         [StoreController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [StoreController::class, 'edit'])->name('edit');
            Route::put('/{id}',      [StoreController::class, 'update'])->name('update');
            Route::delete('/{id}',   [StoreController::class, 'destroy'])->name('destroy');
        });


        // -------------------
        // ORDERS
        // -------------------
        Route::prefix('orders')->name('orders.')->group(function () {
            Route::get('/',                        [OrdersController::class, 'index'])->name('index');
            Route::get('/{id}',                    [OrdersController::class, 'show'])->name('show');
            Route::patch('/{id}/status',           [OrdersController::class, 'updateStatus'])->name('update-status');
            Route::delete('/{id}',                 [OrdersController::class, 'destroy'])->name('destroy');
        });


        // -------------------
        // BLOG
        // -------------------
        Route::prefix('blogs')->name('blogs.')->group(function () {
            Route::get('/',          [BlogsController::class, 'index'])->name('index');
            Route::get('/create',    [BlogsController::class, 'create'])->name('create');
            Route::post('/',         [BlogsController::class, 'store'])->name('store');
            Route::get('/{id}',      [BlogsController::class, 'show'])->name('show');
            Route::get('/{id}/edit', [BlogsController::class, 'edit'])->name('edit');
            Route::put('/{id}',      [BlogsController::class, 'update'])->name('update');
            Route::delete('/{id}',   [BlogsController::class, 'destroy'])->name('destroy');
        });


        // -------------------
        // BLOG CATEGORIES
        // -------------------
        Route::prefix('blog-categories')->name('blog-categories.')->group(function () {
            Route::get('/',          [BlogCategoriesController::class, 'index'])->name('index');
            Route::get('/create',    [BlogCategoriesController::class, 'create'])->name('create');
            Route::post('/',         [BlogCategoriesController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [BlogCategoriesController::class, 'edit'])->name('edit');
            Route::put('/{id}',      [BlogCategoriesController::class, 'update'])->name('update');
            Route::delete('/{id}',   [BlogCategoriesController::class, 'destroy'])->name('destroy');
        });


        // -------------------
        // CONTACT MESSAGES
        // -------------------
        Route::prefix('contact-messages')->name('contact-messages.')->group(function () {
            Route::get('/',               [ContactMessagesController::class, 'index'])->name('index');
            Route::get('/{id}',           [ContactMessagesController::class, 'show'])->name('show');
            Route::patch('/{id}/read',    [ContactMessagesController::class, 'markRead'])->name('mark-read');
            Route::delete('/{id}',        [ContactMessagesController::class, 'destroy'])->name('destroy');
        });


        // -------------------
        // PAGE CONTENT (Biography, Privacy Policy, T&C)
        // -------------------
        Route::prefix('page-content')->name('page-content.')->group(function () {
            Route::get('/',              [PageContentController::class, 'index'])->name('index');
            Route::get('/{slug}/edit',   [PageContentController::class, 'edit'])->name('edit');
            Route::put('/{slug}',        [PageContentController::class, 'update'])->name('update');
        });


        // -------------------
        // SETTINGS
        // -------------------
        Route::prefix('settings')->name('settings.')->group(function () {
            Route::get('/',  [SettingsController::class, 'index'])->name('index');
            Route::post('/', [SettingsController::class, 'update'])->name('update');
        });

    });
