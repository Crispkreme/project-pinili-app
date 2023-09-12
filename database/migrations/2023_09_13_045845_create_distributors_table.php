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
        Schema::create('distributors', function (Blueprint $table) {
            $table->id();
            $table->string('id_number');
            $table->unsignedBigInteger('entity_id');
            $table->unsignedBigInteger('company_id');
            $table->boolean('isActive');
            $table->foreign('entity_id')
                  -> references('id')
                  ->on('entities')
                  ->onDelete('cascade');
            $table->foreign('company_id')
                  -> references('id')
                  ->on('companies')
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
        Schema::dropIfExists('distributors');
    }
};
