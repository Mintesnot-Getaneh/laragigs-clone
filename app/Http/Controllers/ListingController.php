<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{   //show all listings
    public function index() {
        
         return view('listings.index', [
        'listings' => Listing::latest()->filter(request(['tag','search']))->paginate(2)
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
        $formfields = $request->validate([
            'title' => 'required',
            'tags' =>'required',
            'company' => ['required', Rule::unique('listings','company')],
            'location' => 'required',
            'email' => ['required', 'email'],
            'website' => 'required',
            'description' => 'required',
        ]);

        if($request->hasFile('logo')) {
            $formfields['logo'] = $request->file('logo')->store('logos','public');
        }

        Listing::create($formfields);
        
  
     return redirect('/')->with('message', 'Listing created successfully!');
       }

       //show edit form
     public function edit (Listing $listing) {
        return view('listings.edit',['listing' => $listing]);
     }

     //update listing data
      public function update(Request $request, Listing $listing) {
        $formfields = $request->validate([
            'title' => 'required',
            'tags' =>'required',
            'company' => 'required', 
            'location' => 'required',
            'email' => ['required', 'email'],
            'website' => 'required',
            'description' => 'required',
        ] );

        if($request->hasFile('logo')) {
            $formfields['logo'] = $request->file('logo')->store('logos','public');
        }

        $listing->update($formfields);
        
  
     return back()->with('message', 'Listing updated successfully!');
       }
     //Destroy listing
       public function destroy(Listing $listing) {
         $listing->delete();
           return redirect('/')->with('message', 'Listing deleted successfully!');
       }
        
       }

