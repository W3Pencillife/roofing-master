<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeAbout;

class HomeAboutController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'feature_1' => 'nullable|string|max:255',
            'feature_2' => 'nullable|string|max:255',
            'feature_3' => 'nullable|string|max:255',
        ]);

        $homeAbout = HomeAbout::latest()->first();

        if (!$homeAbout) {
            $homeAbout = new HomeAbout();
        }

        $homeAbout->title = $request->title;
        $homeAbout->description = $request->description;
        $homeAbout->feature_1 = $request->feature_1;
        $homeAbout->feature_2 = $request->feature_2;
        $homeAbout->feature_3 = $request->feature_3;
        $homeAbout->save();

        return redirect()->back()->with('success', 'About section updated successfully!');
    }
}