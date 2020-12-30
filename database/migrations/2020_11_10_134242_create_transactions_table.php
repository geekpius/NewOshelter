<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('booking_id')->nullable();
            $table->integer('extension_id')->nullable();
            $table->string('transaction_id');
            $table->string('payment_id');
            $table->double('amount');
            $table->double('service_fee');
            $table->double('discount_fee');
            $table->string('currency');
            $table->string('operator')->nullable();
            $table->string('phone')->nullable();
            $table->string('type');
            $table->string('property_type');
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('transactions');
    }
}
