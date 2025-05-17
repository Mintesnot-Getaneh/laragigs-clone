<?php

use App\Http\Controllers\ListingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
 // all listing
Route::get('/', [ListingController::class, 'index'] );


//show create form
Route::get('/listings/create', [ListingController::class, 'create' ]);

//store listing data
Route::post('/listings', [ListingController::class, 'store' ]);

//show edit form
Route::get('/listings/{listing}/edit',
[ListingController::class, 'edit' ]);


//update listing
 Route::put('/listings/{listing}',
  [ListingController::class, 'update']);

  //Delete listing
 Route::delete('/listings/{listing}',
  [ListingController::class, 'destroy']);
 






// single Listing
Route::get('/listings/{listing}',[ListingController::class, 'show']);









































// Route::get('/hello', function () {
//     return response( '<h1> Hello, World!</h1>', 200)
//         ->header('content-type', 'text/plain' );  });
        
// Route::get('/post/{id}', function ($id) {
//     return response('post' . $id);
// }) -> where('id','[0-9]+');

// Route::get('/search',function(Request $request){
//     return $request->name. ' '. $request->city;

// });