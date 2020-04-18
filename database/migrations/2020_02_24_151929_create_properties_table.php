<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->string('base');
            $table->string('type');
            $table->string('type_status');
            $table->string('title');
            $table->integer('adult')->nullable();
            $table->integer('children')->nullable();
            $table->integer('infant')->nullable();
            $table->boolean('publish')->default(false);
            $table->boolean('vacant')->default(true);
            $table->integer('step')->default(1);
            $table->boolean('done_step')->default(false);
            $table->timestamps();
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
        Schema::dropIfExists('properties');
    }
}
