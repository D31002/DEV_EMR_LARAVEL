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
        Schema::create('phieu_ke_hoach_dieu_tri_details', function (Blueprint $table) {
            $table->id();
            $table->string('issue');
            $table->string('clinical_tests');
            $table->string('treatment_plan');
            $table->string('note');
            $table->string('icd_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phieu_ke_hoach_dieu_tri_details');
    }
};
