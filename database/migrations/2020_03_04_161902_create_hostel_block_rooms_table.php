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
            $table->integer('room');
            $table->integer('no_person');
            $table->integer('occupant')->default(0);
            $table->boolean('full')->default(false);
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
