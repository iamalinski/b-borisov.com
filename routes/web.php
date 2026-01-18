<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeroSectionController;
use App\Http\Controllers\Admin\StoriesSectionController;
use App\Http\Controllers\Admin\GallerySectionController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\SettingsController;

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

// Admin Auth Routes (Guest)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

// Admin Protected Routes
Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Hero Section (Борис Борисов – Фотограф)
    Route::get('hero', [HeroSectionController::class, 'index'])->name('hero.index');
    Route::put('hero', [HeroSectionController::class, 'update'])->name('hero.update');
    Route::delete('hero/image/{image}', [HeroSectionController::class, 'deleteImage'])->name('hero.delete-image');
    Route::post('hero/image/{image}/alt', [HeroSectionController::class, 'updateImageAlt'])->name('hero.update-alt');

    // Stories Section (Истории в кадър)
    Route::get('stories', [StoriesSectionController::class, 'index'])->name('stories.index');
    Route::put('stories', [StoriesSectionController::class, 'update'])->name('stories.update');

    // Gallery Section
    Route::get('gallery', [GallerySectionController::class, 'index'])->name('gallery.index');
    Route::post('gallery/upload', [GallerySectionController::class, 'upload'])->name('gallery.upload');
    Route::delete('gallery/{image}', [GallerySectionController::class, 'deleteImage'])->name('gallery.delete-image');
    Route::post('gallery/order', [GallerySectionController::class, 'updateOrder'])->name('gallery.update-order');
    Route::post('gallery/{image}/alt', [GallerySectionController::class, 'updateAlt'])->name('gallery.update-alt');

    // Packages Section (Услуги и пакетни предложения)
    Route::get('packages', [PackageController::class, 'index'])->name('packages.index');
    
    // Package Sections (Categories)
    Route::get('packages/section/create', [PackageController::class, 'createSection'])->name('packages.section.create');
    Route::post('packages/section', [PackageController::class, 'storeSection'])->name('packages.section.store');
    Route::get('packages/section/{section}/edit', [PackageController::class, 'editSection'])->name('packages.section.edit');
    Route::put('packages/section/{section}', [PackageController::class, 'updateSection'])->name('packages.section.update');
    Route::delete('packages/section/{section}', [PackageController::class, 'destroySection'])->name('packages.section.destroy');

    // Individual Packages
    Route::get('packages/{section}/create', [PackageController::class, 'create'])->name('packages.create');
    Route::post('packages/{section}', [PackageController::class, 'store'])->name('packages.store');
    Route::get('packages/{package}/edit', [PackageController::class, 'edit'])->name('packages.edit');
    Route::put('packages/{package}', [PackageController::class, 'update'])->name('packages.update');
    Route::delete('packages/{package}', [PackageController::class, 'destroy'])->name('packages.destroy');
    Route::post('packages/order', [PackageController::class, 'updateOrder'])->name('packages.update-order');

    // Settings - Footer
    Route::get('settings/footer', [SettingsController::class, 'footer'])->name('settings.footer');
    Route::put('settings/footer', [SettingsController::class, 'updateFooter'])->name('settings.footer.update');

    // Settings - SEO
    Route::get('settings/seo', [SettingsController::class, 'seo'])->name('settings.seo');
    Route::put('settings/seo', [SettingsController::class, 'updateSeo'])->name('settings.seo.update');
    Route::delete('settings/seo/og-image', [SettingsController::class, 'deleteOgImage'])->name('settings.seo.delete-og');
});
