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
        Schema::table('petty_cashes', function (Blueprint $table) {
            $table->dropColumn('purchase_item');
            $table->dropColumn('purchase_remarks');
            $table->unsignedBigInteger('purchase_item_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('petty_cashes', function (Blueprint $table) {
            $table->string('purchase_item');
            $table->text('purchase_remarks');
            $table->dropColumn('purchase_item_id');
        });
    }
};