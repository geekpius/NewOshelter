<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->boolean('message_email')->default(true)->index();
            $table->boolean('message_sms')->default(false)->index();
            $table->boolean('support_email')->default(true)->index();
            $table->boolean('support_sms')->default(false)->index();
            $table->boolean('reminder_email')->default(true)->index();
            $table->boolean('reminder_sms')->default(false)->index();
            $table->boolean('policy_email')->default(true)->index();
            $table->boolean('policy_sms')->default(false)->index();
            $table->boolean('unsubscribe_email')->default(true)->index();
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
        Schema::dropIfExists('user_notifications');
    }
}
