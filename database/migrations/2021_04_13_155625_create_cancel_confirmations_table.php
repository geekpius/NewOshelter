<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCancelConfirmationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cancel_confirmations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('confirmation_id')->unsigned()->index();
            $table->string('reason');
            $table->timestamps();
            $table->foreign('confirmation_id')->references('id')->on('confirmations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cancel_confirmations');
    }
}
