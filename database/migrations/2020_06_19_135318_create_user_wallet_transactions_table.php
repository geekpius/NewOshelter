<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserWalletTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_wallet_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_wallet_id')->unsigned()->index();
            $table->string('transaction_id');
            $table->string('type');
            $table->double('amount');
            $table->boolean('status');
            $table->timestamps();
            $table->foreign('user_wallet_id')->references('id')->on('user_wallets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_wallet_transactions');
    }
}
