<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHostelBlockRoomNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hostel_block_room_numbers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hostel_block_room_id')->unsigned()->index();
            $table->integer('room_no')->index();
            $table->integer('person_per_room')->index();
            $table->integer('occupant')->default(0)->index();
            $table->boolean('full')->default(false)->index();
            $table->timestamps();
            $table->foreign('hostel_block_room_id')->references('id')->on('hostel_block_rooms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hostel_block_room_numbers');
    }
}
