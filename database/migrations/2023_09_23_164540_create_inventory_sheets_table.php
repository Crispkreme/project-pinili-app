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
        Schema::create('inventory_sheets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('distributor_id');
            $table->string('invoice_number')->nullable();
            $table->string('po_number')->nullable();
            $table->string('delivery_number')->nullable();
            $table->string('delivery_date')->nullable();
            $table->string('previous_delivery')->nullable();
            $table->string('present_delivery')->nullable();
            $table->string('or_number')->nullable();
            $table->string('or_date')->nullable();
            $table->text('description');

            $table->foreign('distributor_id')
                  ->references('id')
                  ->on('distributors')
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
        Schema::dropIfExists('inventory_sheets');
    }
};
