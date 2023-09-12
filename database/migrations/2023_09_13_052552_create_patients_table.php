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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gender_id');
            $table->string('id_number');
            $table->string('firstname');
            $table->string('mi')->nullable();
            $table->string('lastname');
            $table->string('age');
            $table->string('contact_number');
            $table->text('address')->nullable();

            $table->foreign('gender_id')
                  ->references('id')
                  ->on('genders')
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
        Schema::dropIfExists('patients');
    }
};
