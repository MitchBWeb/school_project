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
    return View::make('home');
});


// Route for logging out
Route::get('logout','SessionsController@destroy');
// Resource route for SessionsController
Route::resource('sessions','SessionsController');