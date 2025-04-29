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
        Schema::create('phieu_khai_thac_tien_su_di_ungs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('code')->unique();
            $table->string('treatment_code');
            $table->string('patient_code');
            $table->string('patient_fullname');
            $table->string('patient_dob');
            $table->string('patient_gender');
            $table->string('patient_address');
            $table->string('patient_ethnicName');
            $table->string('in_time');
            $table->string('department');
            $table->string('bed_number');
            $table->string('bed_room');
            $table->string('icd_code');
            $table->string('icd_name');
            $table->string('icd_subCode');
            $table->string('icd_text')->nullable();
            $table->string('allergy_history')->nullable();
            $table->string('collection_date');
            $table->string('treatment_doctor_loginName');
            $table->string('treatment_doctor_userName');
            $table->string('information_collector_loginName');
            $table->string('information_collector_userName');
            $table->string('created_by_loginName');
            $table->string('created_by_userName');
            $table->boolean('signed')->default(false);
            $table->string('branch_name');
            $table->string('parent_organization_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phieu_khai_thac_tien_su_di_ungs');
    }
};
