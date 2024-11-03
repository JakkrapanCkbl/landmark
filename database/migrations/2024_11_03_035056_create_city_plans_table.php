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
        Schema::create('city_plans', function (Blueprint $table) {
            $table->id();
            $table->string('asa_no', 20)->nullable();
            $table->string('publish_date', 30)->nullable();
            $table->string('province', 30)->nullable();
            $table->string('description', 500)->nullable();
            $table->string('expire_date', 30)->nullable();
            $table->string('organization', 50)->nullable();
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
        Schema::dropIfExists('city_plans');
    }
};
