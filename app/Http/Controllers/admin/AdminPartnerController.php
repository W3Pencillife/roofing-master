<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;

class AdminPartnerController extends Controller
{
    // Display all partners
    public function index()
    {
        $partners = Partner::latest()->get(); // Fetch all partners
        return view('admin.partners', compact('partners'));
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
}
