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
        Schema::create('phieu_khai_thac_tien_su_di_ung_details', function (Blueprint $table) {
            $table->id();
            $table->number('stt');
            $table->string('content');
            $table->string('allergen_name')->nullable();
            $table->string('occur_times')->nullable();
            $table->boolean('no_reaction');
            $table->string('reaction_handling');
            $table->string('phieu_khai_thac_tien_su_di_ung_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phieu_khai_thac_tien_su_di_ung_details');
    }
};
