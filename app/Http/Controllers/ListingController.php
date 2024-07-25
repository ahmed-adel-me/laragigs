<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index(Request $request)
    {
        return view('listings.index', ['gigs' => Listing::latest()->filter($request->all())->paginate(5)]);
    }
    public function show($id)
    {
        $listing = Listing::findOrFail($id);
        return view('listings.show', [
            'listing' => $listing,
        ]);
    }

    public function create(Request $request)
    {
        return view('listings.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required|unique:listings,company',
            'location' => 'required',
            'website' => 'required',
            'email' => 'required|email',
            'tags' => 'required',
            'description' => 'required',

        ]);
        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }
        $formFields['user_id'] = auth()->id();
        Listing::create($formFields);
        return redirect('/')->with('message', 'Listing created successfully!');
    }

    public function edit($id)
    {
        $listing = Listing::findOrFail($id);
        return view('listings.edit', [
            'listing' => $listing
        ]);
    }
    public function update(Request $request, $id)
    {
        $listing = Listing::findOrFail($id);
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => 'required|email',
            'tags' => 'required',
            'description' => 'required',

        ]);
        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }
        $listing->update($formFields);
        return back()->with('message', 'Listing updated successfully!');
    }
    public function destroy($id)
    {
        Listing::where('id', $id)->delete();
        return redirect('/')->with('message', 'Listing deleted successfully!');
    }

    public function manage()
    {
        $user = auth()->user();
        $listings = $user->listings;
        return view('listings.manage', ['listings' => $listings]);
    }
}
