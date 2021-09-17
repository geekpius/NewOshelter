<?php

use App\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone')->unique();
            $table->string('account_type');
            $table->boolean('is_active')->default(true);
            $table->string('image')->nullable();
            $table->string('email_verification_token')->nullable();
            $table->dateTime('email_verification_expired_at')->nullable();
            $table->boolean('verify_email')->default(User::UNVERIFY_EMAIL);
            $table->dateTime('verify_email_time')->nullable();
            $table->string('sms_verification_token')->nullable();
            $table->boolean('verify_sms')->default(User::UNVERIFY_SMS);
            $table->dateTime('verify_sms_time')->nullable();
            $table->dateTime('login_time')->nullable();
            $table->boolean('is_id_verified')->default(false);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
