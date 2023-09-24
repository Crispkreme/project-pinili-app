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
        Schema::create('inventory_payment_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inventory_sheet_id');
            $table->double('current_paid_amount')->nullable();
            $table->double('balance')->nullable();

            $table->foreign('inventory_sheet_id')
                  ->references('id')
                  ->on('inventory_sheets')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_payment_details');
    }
};
