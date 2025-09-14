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
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\CommercialProjectController;
use \App\Http\Controllers\Admin\ResidentialProjectController;
use \App\Http\Controllers\Admin\SiteSettingController;
use App\Models\HomeAbout;
use App\Models\QuoteForm;
use App\Models\MapSetting;
use App\Models\Post;
use App\Http\Controllers\MapController;



// Public routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/about-us', function () {
    $homeAbout = HomeAbout::first(); // or where(...) if needed
    return view('layouts.about-us', compact('homeAbout'));
});
Route::get('/contact-us', function () {
    $quoteForm = QuoteForm::first();
    $map = MapSetting::first();   
    return view('layouts.contact-us', compact('quoteForm', 'map'));
});

Route::get('/admin/map-settings', [MapController::class, 'index'])->name('map.index');
Route::post('/admin/map-settings', [MapController::class, 'store'])->name('map.store');


// Submit quote message
Route::post('/send-quote', [QuoteFormController::class, 'send'])->name('quote.send');

// Partner Links
Route::get('/partners', [PartnerController::class, 'index']);

// Services by category
//Route::get('/services/{slug}', [PostController::class, 'showByCategory'])->name('services.category');
Route::get('/services/{slug}', [PostController::class, 'showBySlug'])->name('services.category');

Route::get('/test-services', function() {
    $residentialServices = Post::where('category', 'Residential Services')->get();
    $commercialServices = Post::where('category', 'Commercial Services')->get();
    dd($residentialServices, $commercialServices);
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
        Route::delete('/form-submissions/{id}', [QuoteAdminController::class, 'destroy'])->name('admin.form-submissions.destroy');


        // Admin posts
        Route::prefix('posts')->name('admin.posts.')->group(function () {
            Route::get('/', [PostController::class, 'index'])->name('index');
            Route::get('/create', [PostController::class, 'create'])->name('create');
            Route::get('/categories', [PostController::class, 'categories'])->name('categories');
        });

        // Admin projects
        Route::prefix('projects')->name('admin.projects.')->group(function () {
            //Route::get('/residential', [ProjectController::class, 'residential'])->name('residential');

            // Residential projects
        Route::get('/residential', [ResidentialProjectController::class, 'index'])->name('residential');
        Route::post('/residential/update-content', [ResidentialProjectController::class, 'updateContent'])->name('residential.updateContent');
        Route::post('/residential/update-image', [ResidentialProjectController::class, 'updateImage'])->name('residential.updateImage');

            Route::get('/commercial', [ProjectController::class, 'commercial'])->name('commercial');
        });
        // Commercial Projects
        Route::get('/projects/commercial', [CommercialProjectController::class, 'index'])
            ->name('admin.projects.commercial');

        Route::post('/projects/commercial/update', [CommercialProjectController::class, 'update'])
            ->name('admin.projects.commercial.update');
        Route::post('/projects/commercial/update-image', [CommercialProjectController::class, 'updateImage'])
            ->name('admin.projects.commercial.updateImage');

        Route::get('/features', [FeatureController::class, 'index'])->name('admin.features');
        Route::post('/features/header', [FeatureController::class, 'updateHeader'])->name('admin.features.header.update');
        Route::post('/features', [FeatureController::class, 'store'])->name('admin.features.store');
        Route::delete('/features/{id}', [FeatureController::class, 'destroy'])->name('admin.features.destroy');


        Route::get('/partners', [AdminPartnerController::class, 'index'])->name('admin.partners');
        Route::post('/partners', [AdminPartnerController::class, 'store'])->name('admin.partners.store');
        Route::delete('/partners/{id}', [AdminPartnerController::class, 'destroy'])->name('admin.partners.destroy');
        Route::post('/partners/section/update', [AdminPartnerController::class, 'updateSection'])
            ->name('admin.partners.section.update');

        // Site settings
        Route::get('/site-settings', [SiteSettingController::class, 'index'])->name('admin.site-settings');
        Route::post('/site-settings/update', [SiteSettingController::class, 'update'])->name('admin.site-settings.update');

        Route::get('/map', [MapController::class, 'index'])->name('admin.map');
        Route::post('/map', [MapController::class, 'store'])->name('admin.map.store');
    });
});
