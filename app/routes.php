<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Home page will display the login form.
Route::get('/', function()
{
    // If the user is already logged on there is no need for them to access
    // the root file (home page). If they aren't logged in then they see it.
    if(Auth::check()){
        if(Auth::user()->role_id != 'admin'){
            return View::make('profile/index');
        }
        else{
            return View::make('admin/index');
        }
    }
    else{
        return View::make('home');
    }
});


// Route for logging out
Route::get('logout','SessionsController@destroy');
// Resource route for SessionsController
Route::resource('sessions','SessionsController');

// Resource routes below
Route::resource('admin','AdminController');
Route::resource('profile','ProfileController');