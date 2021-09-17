<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('owner_id')->index();
            $table->integer('location_star')->index();
            $table->integer('security_star')->index();
            $table->integer('comm_star')->index();
            $table->integer('value_star')->index();
            $table->integer('accuracy_star')->index();
            $table->integer('tidy_star')->index();
            $table->string('comment')->nullable();
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
        Schema::dropIfExists('property_reviews');
    }
}
