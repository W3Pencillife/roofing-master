<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuoteForm;
use App\Models\QuoteSubmission;

class QuoteAdminController extends Controller
{
    public function index()
    {
        $quote = QuoteForm::latest()->first();
        $submissions = QuoteSubmission::latest()->paginate(10);

        return view('admin.form-submissions', compact('quote', 'submissions'));
    }

    public function update(Request $request)
    {
        // Handle quote content update
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'benefit_1' => 'nullable|string|max:255',
            'benefit_2' => 'nullable|string|max:255',
            'benefit_3' => 'nullable|string|max:255',
        ]);

        $quote = QuoteForm::firstOrNew([]);
        $quote->fill($validated);
        $quote->save();

        return back()->with('success', 'Quote content updated successfully!');
    }

    public function destroy($id)
    {
        $submission = QuoteSubmission::findOrFail($id);
        $submission->delete();

        return redirect()->back()->with('success', 'Submission deleted successfully.');
    }
}
