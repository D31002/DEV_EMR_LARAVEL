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
        Schema::create('bang_kiem_sau_khi_mos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('code')->unique();
            $table->string('treatment_code');
            $table->string('patient_fullname');
            $table->string('patient_dob');
            $table->string('patient_gender');
            $table->string('dateTime_surgery');
            $table->string('dateTime_end');
            $table->string('diagnosis_after');
            $table->string('type_surgery');
            $table->string('created_by_loginName');
            $table->string('created_by_userName');
            $table->boolean('signed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bang_kiem_sau_khi_mos');
    }
};
