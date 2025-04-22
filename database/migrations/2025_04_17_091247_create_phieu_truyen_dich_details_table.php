<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('phieu_truyen_dich_details', function (Blueprint $table) {
            $table->id();
            $table->string('monitoring_dateTime');
            $table->string('transmission_name');
            $table->string('capacity_transmission');
            $table->string('amount_transmission');
            $table->string('unit_transmission');
            $table->string('unit_transmission_name');
            $table->string('unit_convert');
            $table->string('production_batch_transmission');
            $table->string('medicine_name');
            $table->string('amount_medicine');
            $table->string('production_batch_medicine');
            $table->string('speed');
            $table->string('inTime');
            $table->string('endTime');
            $table->string('doctor_prescribed');
            $table->string('nurse_practice');
            $table->boolean('signed')->default(false);
            $table->string('created_by_userName');
            $table->string('created_by_loginName');
            $table->string('phieu_truyen_dich_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phieu_truyen_dich_details');
    }
};
