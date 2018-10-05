<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 75);
            $table->string('last_name', 75);
            //$table->string('email')->unique();
            $table->string('email', 75)->unique();
            $table->string('contact', 30);
            $table->date('birthday');
            $table->text('address');
            $table->string('image')->default('users/default_user.jpg');
            $table->string('password')->nullable();
            $table->string('firebase_id', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
