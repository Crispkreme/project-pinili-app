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
        Schema::create('patient_billings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->default(1);
            $table->unsignedBigInteger('laboratory_id')->default(1);
            $table->unsignedBigInteger('patient_checkup_id');
            $table->unsignedBigInteger('billing_status_id');
            $table->string('invoice_number');
            $table->integer('srp');
            $table->integer('quantity');
            $table->integer('price');
            $table->integer('qty');
            $table->integer('sub_total_medicine');
            $table->integer('sub_total_laboratory');

            $table->foreign('billing_status_id')
                  ->references('id')
                  ->on('statuses')
                  ->onDelete('cascade');
            $table->foreign('patient_checkup_id')
                  ->references('id')
                  ->on('patient_checkups')
                  ->onDelete('cascade');
            $table->foreign('laboratory_id')
                  ->references('id')
                  ->on('laboratories')
                  ->onDelete('cascade');
            $table->foreign('product_id')
                  ->references('id')
                  ->on('products')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_billings');
    }
};
