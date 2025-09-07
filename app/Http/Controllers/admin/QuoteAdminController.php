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
    $submissions = QuoteSubmission::latest()->paginate(10); // paginate, not all()
    return view('admin.form-submissions', compact('quote', 'submissions'));
}


    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
        ]);

        $quote = QuoteForm::firstOrNew([]);
        $quote->fill($request->only(['title','subtitle','benefit_1','benefit_2','benefit_3']));
        $quote->save();

        return back()->with('success', 'Quote section updated successfully!');
    }
}

