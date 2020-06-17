<?php

use App\BookingModel\Booking;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');            
            $table->integer('property_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->date('check_in');
            $table->date('check_out');
            $table->integer('adult');
            $table->integer('children');
            $table->integer('infant');
            $table->boolean('status')->default(Booking::INCOMPLETE);
            $table->integer('step')->default(1);
            $table->timestamps();
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
