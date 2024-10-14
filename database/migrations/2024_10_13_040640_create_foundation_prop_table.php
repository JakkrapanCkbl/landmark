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
        Schema::create('foundation_prop', function (Blueprint $table) {
            $table->id();
            $table->string('prop_type', 20)->nullable();
            $table->string('prop_name', 250)->nullable();
            $table->string('deed_no', 20)->nullable();
            $table->string('rai', 20)->nullable();
            $table->string('ngan', 20)->nullable();
            $table->string('wha', 30)->nullable();
            $table->string('owner', 50)->nullable();
            $table->string('owner_how', 50)->nullable();
            $table->string('certificate', 30)->nullable();
            $table->string('subdistrict', 50)->nullable();
            $table->string('district', 50)->nullable();
            $table->string('province', 50)->nullable();
            $table->string('ns3', 50)->nullable();
            $table->string('sc1', 50)->nullable();
            $table->decimal('prop_size', 8, 2)->default(0)->nullable();
            $table->string('deed_type', 50)->nullable();
            $table->string('foundation_doc', 50)->nullable();
            $table->string('cer_type', 50)->nullable();
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
        Schema::dropIfExists('foundation_prop');
    }
};
