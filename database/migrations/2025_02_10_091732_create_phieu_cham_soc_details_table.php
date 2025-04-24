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
        Schema::create('phieu_cham_soc_details', function (Blueprint $table) {
            $table->id();
            $table->string('monitoring_dateTime');
            $table->text('progress_notes');
            $table->text('care_orders');
            $table->string('signer_code');
            $table->string('signer_name');
            $table->string('created_by_loginName');
            $table->string('created_by_userName');
            $table->string('phieu_cham_soc_id');
            $table->boolean('signed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phieu_cham_soc_details');
    }
};
