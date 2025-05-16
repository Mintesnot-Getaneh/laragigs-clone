<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{   //show all listings
    public function index() {
        
         return view('listings.index', [
        'listings' => Listing::latest()->filter(request(['tag','search']))->get()
   ] );
    }

    //show single listing
    public function show(Listing $listing) {
           return view('listings.show', [
        'listing' => $listing
    ]);
    }
    //show create form
    public function create() {
        return view('listings.create');
    }

    //store listing data

    public function store(Request $request) {
           
    // ...
        $formfields = $request->validate([
            'title' => 'required',
            'tags' =>'required',
            'company' => ['required', Rule::unique('listings','company')],
            'location' => 'required',
            'email' => ['required', 'email'],
            'website' => 'required',
            'description' => 'required',
        ]);

        Listing::create($formfields);
        
  
     return redirect('/')->with('message', 'Listing created successfully!');
       }
}
