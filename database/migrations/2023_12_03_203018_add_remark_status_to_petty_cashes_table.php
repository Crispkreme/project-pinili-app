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
            $table->unsignedBigInteger('petty_cash_status_id')
                  ->after('user_id');
            $table->text('remarks')
                  ->after('file_date')
                  ->default('');
            $table->integer("paid_amount")
                  ->after('remarks')
                  ->default(0);
            $table->integer("discount")
                  ->after('paid_amount')
                  ->default(0);
            $table->integer("total_amount")
                  ->after('discount')
                  ->default(0);
            $table->integer("change")
                  ->after('total_amount')
                  ->default(0);
            $table->integer('isApprove')
                  ->after('change')
                  ->default(0);

            $table->foreign('petty_cash_status_id')
                  ->references('id')
                  ->on('statuses')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('petty_cashes', function (Blueprint $table) {
            $table->dropColumn('petty_cash_status_id');
            $table->dropColumn('remarks');
            $table->dropColumn('paid_amount');
            $table->dropColumn('discount');
            $table->dropColumn('total_amount');
            $table->dropColumn('change');
            $table->dropColumn('isApprove');
        });
    }
};
