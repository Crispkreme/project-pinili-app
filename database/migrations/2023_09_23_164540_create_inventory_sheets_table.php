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
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('distributor_id');
            $table->string('invoice_number');
            $table->string('po_number');
            $table->string('delivery_number');
            $table->string('delivery_date');
            $table->string('previous_delivery');
            $table->string('present_delivery');
            $table->string('or_number')
                ->nullable()
                ->default('xxxxxx');
            $table->string('or_date')
                ->nullable();
            $table->text('description');

            $table->foreign('status_id')
                  ->references('id')
                  ->on('statuses')
                  ->onDelete('cascade');
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
