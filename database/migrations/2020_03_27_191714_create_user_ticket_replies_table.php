<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTicketRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_ticket_replies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_ticket_id')->unsigned()->index();
            $table->mediumText('message');
            $table->boolean('owner');
            $table->timestamps();
            $table->foreign('user_ticket_id')->references('id')->on('user_tickets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_ticket_replies');
    }
}
