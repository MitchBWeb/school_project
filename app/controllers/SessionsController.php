<?php

class SessionsController extends BaseController {
    
    protected $user;
	
    public function __construct(User $user){
        $this->user = $user;
    }
    
    public function store(){
        if(Auth::attempt(Input::only('username','password'))){
            return Redirect::to('/');
        }
        
        $input = Input::only('username','password');

        if( !$this->user->fill($input)->isValid()){
            return Redirect::back()->
                    withInput()->
                    withErrors($this->user->errors)->
                    with('message', 'Unsuccessful Attempt');
        }
            
    }

    public function destroy(){
        Auth::logout();

        return Redirect::to('/');
    }
}
