<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\CommercialProject;
use App\Models\ResidentialProject;
use App\Models\SiteSetting;
use App\Models\Post;
use App\Models\HomeAbout;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share latest commercial project with all views
        $commercialProject = CommercialProject::latest()->first();
        View::share('commercialProject', $commercialProject);

        // Share latest residential project with all views
        $residentialProject = ResidentialProject::latest()->first();
        View::share('residentialProject', $residentialProject);

        // Share site settings and service posts (for navbar) with all views
        View::composer('*', function ($view) {
            $siteSetting = SiteSetting::first(); // fetch first row
            $roofingServices = Post::where('category', 'Roofing Services')->get();
            $commercialServices = Post::where('category', 'Commercial Services')->get();

            $siteLogo = $siteSetting && $siteSetting->logo
                ? 'images/' . $siteSetting->logo
                : 'images/default-logo.png'; // fallback if no logo

            $view->with(compact('siteSetting', 'roofingServices', 'commercialServices', 'siteLogo'));
        });

        // Share HomeAbout data specifically for certain views
        View::composer(['layouts.home-about', 'home'], function ($view) {
            $homeAbout = HomeAbout::latest()->first();
            $view->with('homeAbout', $homeAbout);
        });

        View::composer('*', function ($view) {
    $allServices = Post::all();

    $roofingServices = $allServices->filter(fn($s) => str_contains(strtolower($s->category), 'roof'));
    $commercialServices = $allServices->filter(fn($s) => !str_contains(strtolower($s->category), 'roof'));

    $view->with(compact('roofingServices','commercialServices'));
});
    }
}
