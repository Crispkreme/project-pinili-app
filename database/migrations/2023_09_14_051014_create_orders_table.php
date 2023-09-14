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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('manufacturer_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('status_id');
            $table->string('invoice_number');
            $table->integer('quantity');
            $table->double('purchase_cost');
            $table->double('srp');
            $table->text('remarks')->nullable();
            $table->date('expiry_date')->nullable();
            $table->date('manufacturing_date')->nullable();

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->foreign('supplier_id')
                  ->references('id')
                  ->on('entities')
                  ->onDelete('cascade');
            $table->foreign('manufacturer_id')
                  ->references('id')
                  ->on('distributors')
                  ->onDelete('cascade');
            $table->foreign('product_id')
                  ->references('id')
                  ->on('products')
                  ->onDelete('cascade');
            $table->foreign('status_id')
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
        Schema::dropIfExists('orders');
    }
};
