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
        Schema::create('phieu_ke_hoach_dieu_tris', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('code')->unique();
            $table->string('treatment_code');
            $table->string('patient_code');
            $table->string('patient_fullname');
            $table->string('patient_dob');
            $table->string('patient_gender');
            $table->string('in_time');
            $table->string('department');
            $table->string('bed_number');
            $table->string('bed_room');
            $table->string('icd_code');
            $table->string('icd_name');
            $table->string('icd_subCode');
            $table->string('icd_text')->nullable();
            $table->string('patient_request_first');
            $table->string('patient_request_second');
            $table->string('patient_request_last');
            $table->string('estimated_hospital_days');
            $table->string('estimated_total_cost');
            $table->string('patient_relative_type');
            $table->string('patient_relative_name');
            $table->string('treatment_doctor_loginName');
            $table->string('treatment_doctor_userName');
            $table->string('department_head_approved_loginName');
            $table->string('department_head_approved_userName');
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
        Schema::dropIfExists('phieu_ke_hoach_dieu_tris');
    }
};
