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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('form_id');
            $table->string('barcode')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('medicine_name');
            $table->string('generic_name');
            $table->text('description')->nullable();

            $table->foreign('category_id')
                  ->references('id')
                  ->on('drug_classes')
                  ->onDelete('cascade');

            $table->foreign('form_id')
                  ->references('id')
                  ->on('drug_classes')
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
        Schema::dropIfExists('products');
    }
};
