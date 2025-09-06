<?php

namespace App\Http\Controllers;

use App\Models\HomeDiscover;

class HomeDiscoverController extends Controller
{
    public function index()
    {
        $homeDiscover = HomeDiscover::first(); // just one record for homepage
        return view('home', compact('homeDiscover'));
    }
}
