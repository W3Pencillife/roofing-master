<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuoteForm;
use App\Models\QuoteSubmission;

class QuoteFormController extends Controller
{
    public function index()
    {
        $quote = QuoteForm::latest()->first();
        $submissions = QuoteSubmission::latest()->paginate(10);

        return view('admin.form-submissions', compact('quote','submissions'));
    }
public function send(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    // Save the submission
    QuoteSubmission::create($validated);

    return back()->with('success', 'Your quote request has been submitted successfully!');
}

    public function update(Request $request)
    {
        // Handle delete action coming from the form delete button
        if ($request->filled('delete_id')) {
            $submission = QuoteSubmission::find($request->input('delete_id'));
            if ($submission) {
                $submission->delete();
                return back()->with('success', 'Submission deleted.');
            }
            return back()->with('error', 'Submission not found.');
        }

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