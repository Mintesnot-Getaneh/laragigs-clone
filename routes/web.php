<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
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

//Show Register/Create form
Route::get('/register',
  [UserController::class, 'register']
);


//create new user
Route::post('/users', 
 [UserController::class, 'store']
);

//Log user out

Route::post('/logout', 
 [UserController::class, 'logout']
);

//show login form
Route::get('/login', 
[UserController::class, 'Login']);

//Login user
Route::post('/users/authenticate',
[UserController::class, 'authenticate']);







































// Route::get('/hello', function () {
//     return response( '<h1> Hello, World!</h1>', 200)
//         ->header('content-type', 'text/plain' );  });
        
// Route::get('/post/{id}', function ($id) {
//     return response('post' . $id);
// }) -> where('id','[0-9]+');

// Route::get('/search',function(Request $request){
//     return $request->name. ' '. $request->city;

// });