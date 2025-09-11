<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CommercialProject;

class CommercialProjectController extends Controller
{
    // Show commercial project admin page
    public function index()
    {
        $project = CommercialProject::latest()->first(); 
        return view('admin.commercialprojects', compact('project'));
    }

    // Save or update project
    public function update(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'features' => 'nullable|array',
            'features.*' => 'nullable|string|max:255',
        ]);

        $project = CommercialProject::latest()->first() ?? new CommercialProject();

        $project->title = $request->title;
        $project->description = $request->description;
        $project->features = $request->features; // save as JSON
        $project->save();

        return redirect()->back()->with('success', 'Commercial Project updated successfully!');
    }

    // Update project image
    public function updateImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Get the latest project or create a new one
        $project = CommercialProject::latest()->first() ?? new CommercialProject();

        // Remove old image if exists (optional)
        if ($project->image && file_exists(public_path($project->image))) {
            unlink(public_path($project->image));
        }

        // Save new image in public/images
        $imageName = time() . '_' . uniqid() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        // Store relative path in DB
        $project->image = 'images/' . $imageName;
        $project->save();

        return redirect()->back()->with('success', 'Commercial image updated successfully!');
    }



}
