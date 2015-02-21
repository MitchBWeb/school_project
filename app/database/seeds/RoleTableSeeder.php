<?php

class RoleTableSeeder extends Seeder{

    public function run(){
        // Will delete all data in the table.
        //DB::table('roles')->delete();
        
        // Will add data to table through CMD command
        Role::create(array(
            'name' => 'admin',
            'description'  => 'Will have full access to site.',
        ));
    }

}