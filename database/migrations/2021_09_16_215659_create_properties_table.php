<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\PropertyModel\Property;

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
            $table->string('base')->index();
            $table->string('type')->index();
            $table->string('type_status')->index();
            $table->string('section')->nullable()->index();
            $table->string('title');
            $table->integer('adult')->nullable();
            $table->integer('children')->nullable();
            $table->boolean('publish')->default(Property::NOT_PUBLISH)->index();
            $table->integer('step')->default(1)->index();
            $table->boolean('done_step')->default(Property::NOT_DONE_STEP)->index();
            $table->boolean('is_active')->default(true)->index();
            $table->string('status')->default(Property::PENDING)->index();
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
