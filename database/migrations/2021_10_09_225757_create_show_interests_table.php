<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShowInterestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('show_interests', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('external_id')->nullable()->index();
            $table->integer('property_id')->unsigned()->index();
            $table->string('name');
            $table->string('phone');
            $table->string('status')->default(\App\Models\ShowInterest::NOT_RESPONDED)->index();
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
        Schema::dropIfExists('show_interests');
    }
}
