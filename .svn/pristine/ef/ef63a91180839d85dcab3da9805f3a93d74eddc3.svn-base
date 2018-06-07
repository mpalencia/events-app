<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizer.organizers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 150);
            $table->string('email')->unique();
            $table->text('description');
            $table->text('address');
            $table->string('contact', 30);
            $table->string('image')->default('organizers/default_organizer.jpg');
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
        Schema::dropIfExists('organizer.organizers');
    }
}
