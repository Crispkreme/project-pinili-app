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
        Schema::create('inventory_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inventory_sheet_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('inventory_status_id'); //ship or not ship
            $table->string('or_number')
                  ->nullable()
                  ->default(null);
            $table->string('po_number')
                  ->nullable()
                  ->default(null);
            $table->string('delivery_number')
                  ->nullable()
                  ->default(null);
            $table->integer('qty')->nullable();
            $table->double('price')->nullable();
            $table->integer('subtotal')->nullable();

            $table->foreign('inventory_sheet_id')
                  ->references('id')
                  ->on('inventory_sheets')
                  ->onDelete('cascade');
            $table->foreign('product_id')
                  ->references('id')
                  ->on('products')
                  ->onDelete('cascade');
            $table->foreign('inventory_status_id')
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
        Schema::dropIfExists('inventory_details');
    }
};
