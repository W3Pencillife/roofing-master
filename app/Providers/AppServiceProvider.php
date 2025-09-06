<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\CommercialProject;
use App\Models\ResidentialProject;
use App\Models\SiteSetting;

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

                // Latest residential project
        $residentialProject = ResidentialProject::latest()->first();
        View::share('residentialProject', $residentialProject);

                // Share $siteSetting with all views
        View::composer('*', function ($view) {
            $siteSetting = SiteSetting::first(); // fetch the first settings row
            $view->with('siteSetting', $siteSetting);
        });

            View::composer('layouts.home-about', function ($view) {
        $view->with('homeAbout', \App\Models\HomeAbout::latest()->first());
    });
    
    // Also for home view if needed
    View::composer('home', function ($view) {
        $view->with('homeAbout', \App\Models\HomeAbout::latest()->first());
    });
    }
}
