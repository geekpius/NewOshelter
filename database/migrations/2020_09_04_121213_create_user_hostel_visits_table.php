<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserHostelVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_hostel_visits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('property_id')->unsigned()->index();
            $table->integer('hostel_block_room_id')->unsigned()->index();
            $table->integer('hostel_block_room_number_id')->unsigned()->index();
            $table->date('check_in');
            $table->date('check_out');
            $table->boolean('is_in')->default(true);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
            $table->foreign('hostel_block_room_id')->references('id')->on('hostel_block_rooms')->onDelete('cascade');
            $table->foreign('hostel_block_room_number_id')->references('id')->on('hostel_block_room_numbers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_hostel_visits');
    }
}
