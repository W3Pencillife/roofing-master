<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function updateHero(Request $request)
    {
        $request->validate([
            'hero_title' => 'nullable|string|max:255',
            'hero_text' => 'nullable|string',
            'hero_button_text' => 'nullable|string|max:255',
            'hero_bg' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        $setting = Setting::latest()->first() ?? new Setting();

        $setting->hero_title = $request->hero_title;
        $setting->hero_text = $request->hero_text;
        $setting->hero_button_text = $request->hero_button_text;

        if ($request->hasFile('hero_bg')) {
            $file = $request->file('hero_bg');
            $filename = time().'_'.$file->getClientOriginalName();

            // Move the file to public/images
            $file->move(public_path('images'), $filename);

            // Save path in DB relative to public folder
            $setting->hero_bg = 'images/'.$filename;
        }

        $setting->save();

        return redirect()->back()->with('success', 'Hero section updated successfully!');
    }
}
