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
        Schema::create('drug_classes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('classification_id');
            $table->string('id_number');
            $table->string('name');
            $table->text('description')->nullable();

            $table->foreign('classification_id')
                  ->references('id')
                  ->on('classifications')
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
        Schema::dropIfExists('drug_classes');
    }
};
