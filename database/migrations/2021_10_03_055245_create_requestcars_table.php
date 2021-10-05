<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestcarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requestcars', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('date_of_journey')->nullable();
            $table->string('pickup_time')->nullable();
            $table->string('pessenger')->nullable();
            $table->string('from')->nullable();
            $table->string('to')->nullable();
            $table->string('other_information')->nullable();
            $table->integer('notification')->nullable();
            $table->string('status')->nullable();
            $table->longText('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requestcars');
    }
}
