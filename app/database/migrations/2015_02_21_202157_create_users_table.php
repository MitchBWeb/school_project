<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {
    
    public function up(){
        Schema::create('users', function(Blueprint $table){
            $table->increments('id');
            $table->string('firstname', 32);
            $table->string('lastname', 32);
            $table->string('username', 32);
            $table->string('email', 320);
            $table->string('password', 200);
            $table->string('phone', 32);
            $table->string('role_id', 32);

              // required for Laravel 4.1.26
            $table->string('remember_token', 100)->nullable();
            $table->timestamps();
        });
    }

    public function down(){
        Schema::drop('users');
    }

}
