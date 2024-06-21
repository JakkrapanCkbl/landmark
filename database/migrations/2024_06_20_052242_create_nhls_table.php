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
        Schema::create('nhls', function (Blueprint $table) {
            $table->id();
            $table->string('loan_name')->comment('ชื่อผู้เบิก');
            $table->date('date')->comment('วันที่เบิก');
            $table->string('jobcode')->nullable()->comment('รายงานเลขที่');
            $table->string('zone')->nullable()->comment('โซนที่สำรวจ');
            $table->decimal('fee_travel', 10, 2)->nullable()->comment('ค่าเดินทาง');
            $table->decimal('fee_car_rental', 10, 2)->nullable()->comment('ค่าเช่ารถ');
            $table->decimal('fee_fuel', 10, 2)->nullable()->comment('ค่าน้ำมัน');
            $table->decimal('fee_toll', 10, 2)->nullable()->comment('ค่าทางด่วน');
            $table->decimal('fee_accomodation', 10, 2)->nullable()->comment('ค่าที่พัก');
            $table->decimal('per_diem', 10, 2)->nullable()->comment('ค่าเบี้ยเลี้ยง');
            $table->decimal('fee_wrting', 10, 2)->nullable()->comment('ค่าเขียนงาน');
            $table->decimal('fee_land_title_deed_check', 10, 2)->nullable()->comment('ค่าเช็คโฉนดที่ดิน');
            $table->decimal('fee_survey', 10, 2)->nullable()->comment('ระวาง');
            $table->decimal('fee_photocopy', 10, 2)->nullable()->comment('ค่าถ่ายเอกสาร');
            $table->decimal('fee_urgent', 10, 2)->nullable()->comment('ค่าเร่งงานด่วน');
            $table->decimal('fee_others', 10, 2)->nullable()->comment('ค่าอื่นๆ');
            $table->string('others_remark')->nullable()->comment('อื่นๆ หมายเหตุที่ต้องเบิก');
            $table->decimal('advance_payment', 10, 2)->nullable()->comment('หัก-เงินเบิกล่วงหน้า');
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
        Schema::dropIfExists('nhls');
    }
};
