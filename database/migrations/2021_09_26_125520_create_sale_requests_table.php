<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('external_id')->nullable()->index();
            $table->integer('property_id')->unsigned()->index();
            $table->string('method');
            $table->double('amount');
            $table->string('currency')->default('GHS');
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
        Schema::dropIfExists('sale_requests');
    }
}
