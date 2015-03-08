<?php

class AdminController extends BaseController {
    public function index(){
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
    }
}
