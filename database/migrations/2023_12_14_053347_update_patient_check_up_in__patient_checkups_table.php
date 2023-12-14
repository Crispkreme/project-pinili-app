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
        Schema::table('patient_checkups', function (Blueprint $table) {
            $table->boolean('isNew')
                ->after('remarks')
                ->default(0)
                ->change();
            $table->boolean('isFollowUp')
                ->after('isNew')
                ->default(0)
                ->change();
            $table->date('follow_up_date')
                ->nullable()
                ->change()
                ->after('isFollowUp');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('patient_checkups', function (Blueprint $table) {

            if (Schema::hasColumn('patient_checkups', 'follow_up_date')) {
                $table->date('follow_up_date')->default('1900-01-01');
            }

            $table->boolean('isNew')->default(0);
            $table->boolean('isFollowUp')->default(0);
        });
    }
};