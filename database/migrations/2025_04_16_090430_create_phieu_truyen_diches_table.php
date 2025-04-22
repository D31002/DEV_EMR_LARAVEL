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
        Schema::create('phieu_truyen_diches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('code')->unique();
            $table->string('created_by_userName');
            $table->string('created_by_loginName');
            $table->boolean('signed')->default(false);
            $table->string('hospitalization_number');
            $table->unsignedBigInteger('receipt_number')->nullable();
            $table->string('department');
            $table->string('patient_fullname');
            $table->string('patient_dob');
            $table->string('patient_gender');
            $table->string('bed_number');
            $table->string('bed_room');
            $table->string('icd_code');
            $table->string('icd_name');
            $table->string('icd_subCode');
            $table->string('icd_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phieu_truyen_diches');
    }
};
