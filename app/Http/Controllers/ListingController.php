<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index(Request $request)
    {
        return view('listings.index', ['gigs' => Listing::latest()->filter($request->all())->get()]);
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
        Listing::create($formFields);
        return redirect('/')->with('message', 'Listing created successfully!');
    }
}