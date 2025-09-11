<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSetting;

class SiteSettingController extends Controller
{
    public function index()
    {
        $setting = SiteSetting::first(); // load the first row
        return view('admin.site-settings', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = SiteSetting::first();

        if (!$setting) {
            $setting = new SiteSetting();
        }

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $setting->logo = $filename;
        }

        $setting->footer_tagline   = $request->footer_tagline;
        $setting->copyright_text   = $request->copyright_text;
        $setting->facebook         = $request->facebook;
        $setting->twitter          = $request->twitter;
        $setting->instagram        = $request->instagram;
        $setting->youtube          = $request->youtube;
        $setting->linkedin         = $request->linkedin;

        $setting->save();

        return back()->with('success', 'Footer settings updated successfully.');
    }
}
