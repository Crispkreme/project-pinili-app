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
        Schema::create('patient_checkups', function (Blueprint $table) {
            $table->id();
            $table->string('id_number');
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('patient_bmi_id');
            $table->unsignedBigInteger('status_id');
            $table->string('remarks');

            $table->foreign('patient_id')
                  ->references('id')
                  ->on('patients')
                  ->onDelete('cascade');
            $table->foreign('status_id')
                  ->references('id')
                  ->on('statuses')
                  ->onDelete('cascade');
            $table->foreign('patient_bmi_id')
                  ->references('id')
                  ->on('patient_bmis')
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
        Schema::dropIfExists('patient_checkups');
    }
};
