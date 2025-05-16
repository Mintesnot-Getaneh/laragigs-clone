<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
   //example of a route that returns a JSON response
// Route::get('/posts', function () {
//     return response()->json([
//         'posts' => [
//             [
//                 'title' => 'Post 1'
//             ]
//         ]
//     ]);
// });

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});