<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHostelBlockRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hostel_block_rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_hostel_block_id')->unsigned()->index();
            $table->string('block_room_type');
            $table->integer('block_no_room');
            $table->integer('start_room_no');
            $table->integer('bed_person');
            $table->integer('person_per_room');
            $table->string('furnish');
            $table->integer('kitchen');
            $table->integer('bathroom');
            $table->boolean('bath_private');
            $table->integer('toilet');
            $table->boolean('toilet_private');
            $table->timestamps();
            $table->foreign('property_hostel_block_id')->references('id')->on('property_hostel_blocks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hostel_block_rooms');
    }
}
