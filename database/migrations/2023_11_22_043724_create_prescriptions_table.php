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
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_checkup_id');
            $table->unsignedBigInteger('prescribe_laboratory_id')->default(1);
            $table->unsignedBigInteger('prescribe_medicine_id')->default(1);
            $table->unsignedBigInteger('status_id');
            $table->string('invoice_number');
            $table->string('remarks');
            $table->integer('qty')->default(0);
            $table->boolean('isActive')->default(0);

            $table->foreign('prescribe_laboratory_id')
                  ->references('id')
                  ->on('prescribe_laboratories')
                  ->onDelete('cascade');
            $table->foreign('patient_checkup_id')
                  ->references('id')
                  ->on('patient_checkups')
                  ->onDelete('cascade');
            $table->foreign('prescribe_medicine_id')
                  ->references('id')
                  ->on('prescribe_medicines')
                  ->onDelete('cascade');
            $table->foreign('status_id')
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
        Schema::dropIfExists('prescriptions');
    }
};
