<?php

class SessionsController extends BaseController {
    
    protected $user;
	
    public function __construct(User $user){
        $this->user = $user;
    }
    
    public function store(){
        // Get data from the user input.
        $data = Input::only(['username','password']);
        
        // Create some rules for the Validator.
        $validator = Validator::make(
            $data,
            [
                'username' => 'required',
                'password' => 'required',
            ]
        );
        
        // Run validation using the rules from above. If validation should fail
        // return the user back to the page they were on (home page with login
        // form). The error messages will be displayed with the users input.
        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }


        if(Auth::attempt(Input::only('username','password'))){
            if(Auth::user()->role_id == 'admin'){
                return Redirect::to('admin');
            }
            return Redirect::to('profile');
        }
        return Redirect::back()->withInput()->with('message','Unsuccessful Login');
    }

    public function destroy(){
        Auth::logout();

        return Redirect::to('/');
    }
}
