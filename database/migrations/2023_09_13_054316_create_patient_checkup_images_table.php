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
        Schema::create('patient_checkup_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_checkup_id');
            $table->string('checkup_image');

            $table->foreign('patient_checkup_id')
                  ->references('id')
                  ->on('patient_checkups')
                  ->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_checkup_images');
    }
};
