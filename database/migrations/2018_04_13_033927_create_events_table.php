<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('organizer_id')->unsigned();
            $table->string('name', 150);
            $table->text('description');
            $table->string('image')->default('events/default_event.jpg');
            $table->decimal('price', 8, 2);
            $table->integer('ticket_max')->comment('The maximum allowable ticket ina certain event');
            $table->enum('status', ['O', 'L', 'D'])->default('O')->comment('O for Open, L for Live, D for Done');
            $table->timestamps();

            $table->foreign('organizer_id')
                ->references('id')
                ->on('organizers')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
