<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\Admin\TermController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SceneTermController;
use Illuminate\Support\Facades\Route;

// フロント
Route::get('/', [FrontController::class, 'index'])->name('home');

Route::get('/search', [\App\Http\Controllers\SearchController::class, 'index'])->name('search');
Route::get('/category/{category}', [FrontController::class, 'category'])->name('category.show');

Route::get('/scenes/{scene:slug}', [FrontController::class, 'scene'])
    ->name('scene.show');

// 固定ページ
Route::get('/privacy-policy', [\App\Http\Controllers\StaticPageController::class, 'privacy'])->name('privacy');
Route::get('/about', [\App\Http\Controllers\StaticPageController::class, 'about'])->name('about');
Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'send'])->name('contact.send');
Route::get('/contact/complete', [\App\Http\Controllers\ContactController::class, 'complete'])->name('contact.complete');

Route::get('/{term:slug}', [FrontController::class, 'show'])
    ->name('terms.show');

Route::get('/sitemap.xml', [\App\Http\Controllers\SitemapController::class, 'index'])->name('sitemap');

// 管理画面ログイン
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.post');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

// 管理画面 (要認証)
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::resource('terms', TermController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('ads', AdController::class);
    Route::resource('scene_terms', SceneTermController::class);
    // サイト設定
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [SettingController::class, 'update'])->name('settings.update');
});
