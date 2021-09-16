<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHostelRoomAmenitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hostel_room_amenities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hostel_block_room_id')->unsigned()->index();
            $table->string('name')->index();
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
        Schema::dropIfExists('hostel_room_amenities');
    }
}
