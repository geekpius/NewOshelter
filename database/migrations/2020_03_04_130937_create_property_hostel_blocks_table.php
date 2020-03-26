<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyHostelBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_hostel_blocks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_id')->unsigned()->index();
            $table->string('block_name');
            $table->string('type');
            $table->integer('no_room');
            $table->integer('bed');
            $table->integer('per_room');
            $table->integer('kitchen');
            $table->integer('bathroom');
            $table->boolean('bath_private');
            $table->integer('toilet');
            $table->boolean('toilet_private');
            $table->timestamps();
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property_hostel_blocks');
    }
}
