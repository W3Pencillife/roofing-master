<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\PartnersSectionSetting;

class AdminPartnerController extends Controller
{
    // Display all partners
    public function index()
    {
        $partners = Partner::latest()->get();
        $partnersSection = PartnersSectionSetting::first(); // get section settings
        return view('admin.partners', compact('partners', 'partnersSection'));
    }


    // Store new partner
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'link' => 'nullable|url|max:255',
            'image' => 'required|image|max:2048', // max 2MB
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        Partner::create([
            'name' => $request->name,
            'link' => $request->link,
            'image' => $imageName,
        ]);

        return redirect()->back()->with('success', 'Partner added successfully.');
    }

    // Delete partner
    public function destroy($id)
    {
        $partner = Partner::findOrFail($id);
        $imagePath = public_path('images/' . $partner->image);

        if(file_exists($imagePath)){
            unlink($imagePath);
        }

        $partner->delete();
        return redirect()->back()->with('success', 'Partner deleted successfully.');
    }

    public function updateSection(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'highlight_text' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Always update the first row (id=1)
        $section = PartnersSectionSetting::first();
        if (!$section) {
            $section = new PartnersSectionSetting();
        }

        $section->title = $request->title;
        $section->highlight_text = $request->highlight_text;
        $section->description = $request->description;
        $section->save();

        return redirect()->back()->with('success', 'Partners section updated successfully.');
    }
}
