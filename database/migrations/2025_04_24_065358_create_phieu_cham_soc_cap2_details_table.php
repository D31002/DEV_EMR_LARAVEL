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
        Schema::create('phieu_cham_soc_cap2_details', function (Blueprint $table) {
            $table->id();
            $table->string('dateTime_care');
            $table->string('patient_condition');
            $table->string('care_goals');
            $table->string('nursing_actions');
            $table->string('evaluation_notes');
            $table->string('nurse_practice_code');
            $table->string('nurse_practice_name');
            $table->string('created_by_loginName');
            $table->string('created_by_userName');
            $table->string('phieu_cham_soc_cap2_id');
            $table->boolean('signed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phieu_cham_soc_cap2_details');
    }
};
