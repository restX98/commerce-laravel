<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    public function index() {
        return view('listings.index', [
            'heading' => "Listings",
            // 'listings' => Listing::latest()->filter(request(['tag', 'search']))->simplePaginate(6)
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    public function show(Listing $listing) {
        return view("listings.show", [
            'listing' => $listing
        ]);
    }

    public function create() {
        return view("listings.create");
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        Listing::create($formFields);
        
        return redirect('/');
    }

    public function edit(Listing $listing) {
        return view('listings.edit', ['listing' => $listing]);
    }

    public function update(Request $request, Listing $listing) {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        $listing->update($formFields);
        
        return back()->with('success', 'true');
    }

    public function destroy(Listing $listing) {

        Listing::destroy($listing->id);

        return redirect('/')->with('success', 'true');
    }
}
