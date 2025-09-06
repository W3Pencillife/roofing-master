<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\QuoteForm;
use App\Models\HomeAbout;
use App\Models\CommercialProject;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch latest settings
        $setting = Setting::latest()->first();

        // Fetch latest quote form entry
        $quote = QuoteForm::latest()->first();

        // Fetch about section content (latest entry)
        $homeAbout = HomeAbout::latest()->first();

        // Fetch commercial project content (latest entry)
        $commercialProject = CommercialProject::latest()->first();

        // Pass everything to home.blade.php
        return view('home', compact('setting', 'quote', 'homeAbout', 'commercialProject'));
    }
}
