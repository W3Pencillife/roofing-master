<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema; // <-- move here
use App\Models\QuoteForm;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */

    public function boot()
    {
        $setting = null;
        $quote = null;

        if (Schema::hasTable('settings')) {
            $setting = DB::table('settings')->first();
        }

        if (Schema::hasTable('quote_forms')) {
            $quote = QuoteForm::orderBy('id', 'desc')->first();
        }

        View::share('siteLogo', $setting?->logo ?? 'images/default-logo.png');
        View::share('heroBg', $setting?->hero_bg ?? 'images/default-hero.jpeg');
        View::share('heroTitle', $setting?->hero_title ?? 'Default Hero Title');
        View::share('heroText', $setting?->hero_text ?? 'Default hero description...');
        View::share('quote', $quote);
    }

}
