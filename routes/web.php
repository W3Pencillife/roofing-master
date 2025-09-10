<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuoteFormController;
use App\Http\Controllers\Admin\QuoteAdminController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminForgotPasswordController;
use App\Http\Controllers\Admin\AdminResetPasswordController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\HomeAboutController;
use App\Http\Controllers\Admin\HomeDiscoverController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\AdminPartnerController;


// Public routes
Route::get('/', function () {
    return view('welcome');
});

// Submit quote message
Route::post('/send-quote', [QuoteFormController::class, 'send'])->name('quote.send');

// Partner Links
Route::get('/partners', [PartnerController::class, 'index']);

// Services by category
//Route::get('/services/{slug}', [PostController::class, 'showByCategory'])->name('services.category');
Route::get('/services/{slug}', [PostController::class, 'showBySlug'])->name('services.category');

Route::get('/test-services', function() {
    $roofingServices = \App\Models\Post::where('category', 'Roofing Services')->get();
    $commercialServices = \App\Models\Post::where('category', 'Commercial Services')->get();
    dd($roofingServices, $commercialServices);
});

// Admin Authentication
Route::prefix('admin')->group(function () {
    Route::get('login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('login', [AdminController::class, 'loginSubmit'])->name('admin.login.submit');

    Route::get('register', [AdminController::class, 'register'])->name('admin.register');
    Route::post('register', [AdminController::class, 'registerSubmit'])->name('admin.register.submit');

    // Forgot Password
    Route::get('password/reset', [AdminForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
    Route::post('password/email', [AdminForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');

    // Reset Password
    Route::get('password/reset/{token}', [AdminResetPasswordController::class, 'showResetForm'])->name('admin.password.reset');
    Route::post('password/reset', [AdminResetPasswordController::class, 'reset'])->name('admin.password.update');

    // Protected admin routes
    Route::middleware('auth:admin')->group(function () {

        Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout');

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        // General settings
        Route::get('/general', function () {
            $setting = \App\Models\Setting::latest()->first();
            return view('admin.general', compact('setting'));
        })->name('admin.general');

        Route::post('/general/about/update', [HomeAboutController::class, 'update'])->name('admin.general.about.update');
        Route::post('/general/hero/update', [SettingController::class, 'updateHero'])->name('admin.general.hero.update');
        Route::post('/general/discover/update', [HomeDiscoverController::class, 'update'])->name('admin.general.discover.update');

        // Quote section + submissions
        Route::get('/form-submissions', [QuoteAdminController::class, 'index'])->name('admin.form-submissions');
        Route::post('/form-submissions/update', [QuoteAdminController::class, 'update'])->name('admin.form-submissions.update');

        // Admin posts
        Route::prefix('posts')->name('admin.posts.')->group(function () {
            Route::get('/', [PostController::class, 'index'])->name('index');
            Route::get('/create', [PostController::class, 'create'])->name('create');
            Route::get('/categories', [PostController::class, 'categories'])->name('categories');
        });

        // Admin projects
        Route::prefix('projects')->name('admin.projects.')->group(function () {
            Route::get('/', [ProjectController::class, 'index'])->name('index');
            Route::get('/residential', [ProjectController::class, 'residential'])->name('residential');
            Route::get('/commercial', [ProjectController::class, 'commercial'])->name('commercial');
        });

        Route::get('/features', function () {
            return view('admin.features');
        })->name('admin.features');

        Route::get('/partners', [AdminPartnerController::class, 'index'])->name('admin.partners');
        Route::post('/partners', [AdminPartnerController::class, 'store'])->name('admin.partners.store');
        Route::delete('/partners/{id}', [AdminPartnerController::class, 'destroy'])->name('admin.partners.destroy');
        

        Route::get('/site-settings', function () {
            return view('admin.site-settings');
        })->name('admin.site-settings');

    });
});
