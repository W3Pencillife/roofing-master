<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeDiscover;

class HomeDiscoverController extends Controller
{
    public function update(Request $request)
    {
        $homeDiscover = HomeDiscover::first(); // only one record
        if (!$homeDiscover) {
            $homeDiscover = new HomeDiscover();
        }

        $homeDiscover->title = $request->title;
        $homeDiscover->description = $request->description;
        $homeDiscover->button_text = $request->button_text;
        $homeDiscover->button_link = $request->button_link;
        $homeDiscover->save();

        return back()->with('success', 'Discover Section updated successfully!');
    }
}
