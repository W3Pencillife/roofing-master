<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuoteFormController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminForgotPasswordController;
use App\Http\Controllers\Admin\AdminResetPasswordController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\HomeAboutController;



Route::get('/', function () {
    return view('welcome');
});

//submit quote message
Route::post('/send-quote', [QuoteFormController::class, 'send'])->name('quote.send');

//Partner Links Path
Route::get('/partners', [PartnerController::class, 'index']);

//service category
//Route::get('/services/{slug}', [PostController::class, 'showBySlug'])->name('services.category');
Route::get('/services/{slug}', [PostController::class, 'showByCategory'])
     ->name('services.category');

// Route for Admin Panel
// Admin Login
Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'loginSubmit'])->name('admin.login.submit');

// Admin Register
Route::get('admin/register', [AdminController::class, 'register'])->name('admin.register');
Route::post('admin/register', [AdminController::class, 'registerSubmit'])->name('admin.register.submit');

// Forgot Password Form
Route::get('admin/password/reset', [AdminForgotPasswordController::class, 'showLinkRequestForm'])
    ->name('admin.password.request');

Route::post('admin/password/email', [AdminForgotPasswordController::class, 'sendResetLinkEmail'])
    ->name('admin.password.email');

// Reset Password Form
Route::get('admin/password/reset/{token}', [AdminResetPasswordController::class, 'showResetForm'])
    ->name('admin.password.reset');

Route::post('admin/password/reset', [AdminResetPasswordController::class, 'reset'])
    ->name('admin.password.update');

// Add log out route
Route::post('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Admin routes
Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    
    Route::get('/general', function () {
        return view('admin.general');
    })->name('admin.general');

    Route::post('/general/about/update', [HomeAboutController::class, 'update'])->name('admin.general.about.update');

    
    Route::prefix('admin/posts')->name('admin.posts.')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('index');
        Route::get('/create', [PostController::class, 'create'])->name('create');
        Route::get('/categories', [PostController::class, 'categories'])->name('categories');
    });
        
    Route::get('/form-submissions', function () {
        return view('admin.form-submissions');
    })->name('admin.form-submissions');
    
    Route::prefix('admin/projects')->name('admin.projects.')->group(function () {
        Route::get('/', [ProjectController::class, 'index'])->name('index'); 
        Route::get('/residential', [ProjectController::class, 'residential'])->name('residential');
        Route::get('/commercial', [ProjectController::class, 'commercial'])->name('commercial');
    });

    
    Route::get('/features', function () {
        return view('admin.features');
    })->name('admin.features');
    
    Route::get('/partners', function () {
        return view('admin.partners');
    })->name('admin.partners');
    
    Route::get('/site-settings', function () {
        return view('admin.site-settings');
    })->name('admin.site-settings');
    
    
});











