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
        Schema::create('patient_purchase_prescriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_checkup_id');
            $table->unsignedBigInteger('patient_purchase_status_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('laboratory_id');

            $table->foreign('patient_checkup_id')
                  ->references('id')
                  ->on('patient_checkups')
                  ->onDelete('cascade');
            $table->foreign('laboratory_id')
                  ->references('id')
                  ->on('prescribe_laboratories')
                  ->onDelete('cascade');
            $table->foreign('product_id')
                  ->references('id')
                  ->on('prescribe_medicines')
                  ->onDelete('cascade');
            $table->foreign('patient_purchase_status_id')
                  ->references('id')
                  ->on('statuses')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_purchase_prescriptions');
    }
};
