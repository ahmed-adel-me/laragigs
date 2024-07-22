<?php

use App\Models\Listing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('listings', ['gigs' => Listing::all()]);
});

Route::get(
    '/listings/{id}',
    function ($id) {
        $listing = Listing::findOrFail($id);
        return view('listing', [
            'listing' => $listing,
        ]);
    }
);

Route::get(
    "/search",
    function (Request $request) {
        dd($request->name);
    }
);
