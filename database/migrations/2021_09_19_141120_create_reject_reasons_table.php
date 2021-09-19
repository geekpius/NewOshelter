<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRejectReasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reject_reasons', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('external_id')->nullable()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->morphs('rejectable');
            $table->mediumText('reason');
            $table->string('status')->default(\App\RejectReason::NOT_READ);
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
        Schema::dropIfExists('reject_reasons');
    }
}
