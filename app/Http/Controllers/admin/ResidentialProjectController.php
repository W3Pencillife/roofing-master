<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ResidentialProject;

class ResidentialProjectController extends Controller
{
    public function index()
    {
        $project = ResidentialProject::first(); // fetch first project
        return view('admin.residentialprojects', compact('project'));
    }

    public function updateContent(Request $request)
    {
        $project = ResidentialProject::first();
        $project->title = $request->title;
        $project->description = $request->description;
        $project->features = json_encode($request->features);
        $project->save();

        return redirect()->back()->with('success', 'Content updated successfully!');
    }

    public function updateImage(Request $request)
    {
        $project = ResidentialProject::first();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'images/' . time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $project->image = $filename;
            $project->save();
        }

        return redirect()->back()->with('success', 'Image updated successfully!');
    }
}
