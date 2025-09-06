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
            $path = $request->file('hero_bg')->store('uploads/hero', 'public');
            $setting->hero_bg = $path;
        }

        $setting->save();

        return redirect()->back()->with('success', 'Hero section updated successfully!');
    }
}
