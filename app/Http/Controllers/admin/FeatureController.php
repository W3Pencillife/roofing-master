<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChooseSection;
use App\Models\ChooseBenefit;

class FeatureController extends Controller
{
    // Show features page
    public function index()
    {
        $section = ChooseSection::latest()->first();
        $features = $section ? $section->benefits : [];

        return view('admin.features', compact('section', 'features'));
    }

    // Update section header (title + highlight)
    public function updateHeader(Request $request)
    {
        $request->validate([
            'sectionTitle' => 'required|string|max:255',
            'highlightText' => 'nullable|string|max:255',
        ]);

        $section = ChooseSection::latest()->first();
        if (!$section) {
            $section = new ChooseSection();
        }

        $section->title = $request->sectionTitle;
        $section->highlight = $request->highlightText;
        $section->save();

        return redirect()->route('admin.features')->with('success', 'Section header updated successfully!');
    }

    // Store a new feature
    public function store(Request $request)
    {
        $request->validate([
            'featureTitle' => 'required|string|max:255',
            'featureIcon' => 'required|string|max:255',
            'featureDescription' => 'required|string',
        ]);

        $section = ChooseSection::latest()->first();
        if (!$section) {
            $section = ChooseSection::create([
                'title' => 'Why Choose Us?',
                'highlight' => 'Us'
            ]);
        }

        ChooseBenefit::create([
            'choose_section_id' => $section->id,
            'icon' => $request->featureIcon,
            'heading' => $request->featureTitle,
            'description' => $request->featureDescription,
        ]);

        return redirect()->route('admin.features')->with('success', 'Feature added successfully!');
    }

    // Delete feature
    public function destroy($id)
    {
        $feature = ChooseBenefit::findOrFail($id);
        $feature->delete();

        return redirect()->route('admin.features')->with('success', 'Feature deleted successfully!');
    }
}
