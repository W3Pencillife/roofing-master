<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MapSetting;

class MapController extends Controller
{
    // Show admin map settings page
    public function index()
    {
        $map = MapSetting::first(); // fetch first record
        return view('admin.map', compact('map'));
    }

    // Store or update settings
    public function store(Request $request)
    {
        $validated = $request->validate([
            'map_embed_url' => 'required|string',
            'map_height'    => 'required|integer|min:200|max:800',
            'location_name' => 'nullable|string|max:255',
            'address'       => 'required|string|max:255',
            'phone'         => 'required|string|max:50',
            'email'         => 'required|email|max:255',
        ]);

        $map = MapSetting::firstOrNew([]);
        $map->fill($validated);
        $map->save();

        return redirect()->route('admin.map')->with('success', 'Map settings updated successfully!');
    }
}
