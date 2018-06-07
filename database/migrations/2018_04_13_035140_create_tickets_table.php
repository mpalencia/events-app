<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event.tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('event_id')->unsigned();
            $table->bigInteger('order_number')->unique()->comment('like unique receipt no#');
            $table->text('description');
            $table->string('seat');
            $table->tinyInteger('attended')->default(0)->comment('Marks if the attendee attended the event. 1 for true, 0 for false');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users.users')
                ->onDelete('cascade');

            $table->foreign('event_id')
                ->references('id')
                ->on('event.events')
                ->onDelete('cascade');

            $table->unique(['user_id', 'event_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event.tickets');
    }
}
