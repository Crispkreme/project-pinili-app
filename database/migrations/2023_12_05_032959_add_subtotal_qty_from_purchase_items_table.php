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
        Schema::table('purchase_items', function (Blueprint $table) {
            $table->integer("qty")
                  ->after('purchase_item')
                  ->default(0);
            $table->integer("subtotal")
                  ->after('qty')
                  ->default(0);
            $table->integer("price")
                  ->after('subtotal')
                  ->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('purchase_items', function (Blueprint $table) {
            $table->dropColumn('price');
            $table->dropColumn('subtotal');
            $table->dropColumn('qty');
        });
    }
};