<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_id')->unsigned()->index();
            $table->integer('payment_duration')->nullable()->index();
            $table->integer('minimum_stay')->nullable()->index();
            $table->integer('maximum_stay')->nullable()->index();
            $table->string('price_calendar')->nullable();
            $table->double('property_price')->index();
            $table->double('smart_price')->nullable();
            $table->string('currency');
            $table->boolean('negotiable')->nullable();
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
        Schema::dropIfExists('property_prices');
    }
}
