<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->id();
            $table->string('invoiceno')->unique();
            $table->date('invoicedate');
            $table->string('customer');
            $table->string('address');
            $table->string('description');
            $table->integer('qty');
            $table->integer('amountjob');
            $table->string('remark');
            $table->string('receiptno');
            $table->date('receiptdate');
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
        Schema::dropIfExists('invoice');
    }
};
