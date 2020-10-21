<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyHostelPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_hostel_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hostel_block_room_id')->unsigned()->index();
            $table->integer('payment_duration')->nullable();
            $table->string('price_calendar')->nullable();
            $table->double('property_price');
            $table->string('currency');
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
        Schema::dropIfExists('property_hostel_prices');
    }
}
