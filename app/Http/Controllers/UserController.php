<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //show Register/Create Form

   public function register(){
    return view('users.register');
   }

   //Create New user
   public function store(Request $request) {
    $formFields = $request->validate([
        'name' => ['required','min:3'],
        'email' => ['required', 'email', Rule::unique('users','email')],
        'password' => ['required', 'confirmed', 'min:6']
    ]);
    //Hash Password
    $formFields['password'] = bcrypt($formFields['password']);
     
    //creating user with the model
    $user = User::create($formFields);
     
    //Login
   
    Auth::login($user);

    return redirect('/') ->with('message', 'User created and logged in!');
}

//logout
public function logout(Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/')->with('message', 'You have been logged out!');
}
//show login form
public function login() {
    return view('users.login');

}
  //authenticate user

  public function authenticate(Request $request) {
    $formFields = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required']
    ]);

    if (Auth::attempt($formFields)) {
        $request->session()->regenerate();
        return redirect('/')->with('message', 'You are logged in!');
    }

    return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');

} 
}