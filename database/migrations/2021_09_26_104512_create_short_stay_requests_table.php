<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShortStayRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('short_stay_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('external_id')->nullable()->index();
            $table->integer('property_id')->unsigned()->index();
            $table->date('check_in');
            $table->date('check_out');
            $table->double('amount');
            $table->integer('adult')->default(1);
            $table->integer('children')->default(0);
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
        Schema::dropIfExists('short_stay_requests');
    }
}
