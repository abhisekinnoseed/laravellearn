<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function showLogin()
{
    // show the form
   // return View::make('login');
    return view('login');
}

public function doLogin(Request $request)
{
	// process the form
	$rules = array(
    'email'    => 'required|email', // make sure the email is an actual email
    'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
    );

    $validator = Validator::make($request->all(), $rules);

// if the validator fails, redirect back to the form
if ($validator->fails()) {
    return Redirect::to('login')
        ->withErrors($validator); // send back all errors to the login form
       // ->withInput(Request::except('password')); // send back the input (not the password) so that we can repopulate the form
} else {

    // create our user data for the authentication
    $userdata = array(
        'email'     => Request::get('email'),
        'password'  => Request::get('password')
    );
echo 'SUCCESS!';
    // attempt to do the login
    if (Auth::attempt($userdata)) {

        // validation successful!
        // redirect them to the secure section or whatever
        // return Redirect::to('secure');
        // for now we'll just echo success (even though echoing in a controller is bad)
        echo 'SUCCESS!';

    } else {        

        // validation not successful, send back to form 
        return Redirect::to('login');

    }

}
}

}

