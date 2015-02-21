<?php

class UserTableSeeder extends Seeder{

    public function run(){
        //DB::table('users')->delete();
        User::create(array(
            'firstname' => 'Steve',
            'lastname'  => 'Smith',
            'username'  => 'steves',
            'email'     => 'stevesmith@outlook.com',
            'password'  => Hash::make('password'),
            'phone'     => '7894561230',
            'role_id'   => 'member'
        ));
    }

}