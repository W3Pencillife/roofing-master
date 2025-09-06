<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeDiscover;

class HomeDiscoverController extends Controller
{
    public function update(Request $request)
    {
        $homeDiscover = HomeDiscover::first() ?? new HomeDiscover();

        $homeDiscover->title = $request->title;
        $homeDiscover->description = $request->description;
        $homeDiscover->button_text = $request->button_text;
        $homeDiscover->button_link = $request->button_link;

        if ($request->hasFile('discover_bg')) {
            $path = $request->file('discover_bg')->store('discover', 'public');
            $homeDiscover->discover_bg = $path;
        }

        $homeDiscover->save();

        return back()->with('success', 'Discover Section updated successfully!');
    }

}
