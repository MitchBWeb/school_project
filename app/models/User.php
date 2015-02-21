<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;


	protected $table = 'users';
	protected $hidden = array('password', 'remember_token');
        protected $fillable = ['username','password','firstname','lastname',
                               'email','phone'];
        public $errors;
	public static $rules = [
            'username'	=> 'required|alphaNum',
            'password'	=> 'required'
	];
        
        
        public function isValid(){
            $validation = Validator::make($this->attributes, static::$rules);

            if($validation->passes()){
                return true;
            }
            else{
                $this->errors = $validation->messages();
                return false;
            }
	}

}
