<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrchidUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
             $table->bigIncrements('id');
             $table->string('name');
             $table->string('email')->unique();
             $table->string('password');
             $table->timestamp('last_login')->nullable();
             $table->jsonb('permissions')->nullable();
             $table->rememberToken();
             $table->timestamps();
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
