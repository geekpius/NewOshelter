<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMobileWithdrawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobile_withdraws', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('withdraw_id')->unsigned()->index();
            $table->string('phone_number');
            $table->string('network_type');
            $table->string('account_name');
            $table->timestamps();
            $table->foreign('withdraw_id')->references('id')->on('withdraws')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mobile_withdraws');
    }
}
