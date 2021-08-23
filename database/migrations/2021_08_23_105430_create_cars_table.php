<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('token')->nullable();
            $table->string('avatar')->nullable();
            $table->string('type')->nullable();
            $table->string('reg_number')->nullable();
            $table->string('registration_year')->nullable();
            $table->string('model')->nullable();
            $table->string('condition')->nullable();
            $table->string('ac')->nullable();
            $table->text('fuel')->nullable();
            $table->string('gearbox')->nullable();
            $table->string('sitting')->nullable();
            $table->string('color')->nullable();
            $table->string('location')->nullable();
            $table->string('isavailable')->nullable();
            $table->string('other_features')->nullable();
            $table->string('owner_driver')->nullable();
            $table->text('note')->nullable();
            $table->string('prefered')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('status')->default(1);
            $table->integer('notification')->default(0);
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
        Schema::dropIfExists('cars');
    }
}
