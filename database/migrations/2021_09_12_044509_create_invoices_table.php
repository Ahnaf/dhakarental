<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name')->nullable();
            $table->string('phone')->nullable();
            $table->longText('address')->nullable();
            $table->string('date_of_trip')->nullable();
            $table->string('ref_number')->nullable();
            $table->string('notes')->nullable();
            $table->integer('total')->nullable();
            $table->integer('vat')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('grandtotal')->nullable();
            $table->integer('totalitem')->nullable();
            $table->integer('paidamount')->nullable();
            $table->integer('dueamount')->nullable();
            $table->foreignId('created_by')->nullable();
            $table->foreignId('customer_id')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
