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
        Schema::create('inventory_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inventory_sheet_id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('paid_status_id');
            $table->double('paid_amount')->nullable();
            $table->double('due_amount')->nullable();
            $table->double('total_amount')->nullable();
            $table->double('discount_amount')->nullable();

            $table->foreign('inventory_sheet_id')
                  ->references('id')
                  ->on('inventory_sheets')
                  ->onDelete('cascade');
            $table->foreign('customer_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->foreign('paid_status_id')
                  ->references('id')
                  ->on('statuses')
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
        Schema::dropIfExists('inventory_payments');
    }
};
