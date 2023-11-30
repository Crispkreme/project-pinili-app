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
        Schema::table('patient_bmis', function (Blueprint $table) {
            $table->text('diagnosis')
                  ->after('symptoms')
                  ->default('');
        });

        // Uncomment the following lines if you want to rename an existing column
        // Schema::table('patient_bmis', function (Blueprint $table) {
        //     $table->renameColumn('old_name', 'new_name');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('patient_bmis', function (Blueprint $table) {
            $table->dropColumn('diagnosis');
        });

        // Uncomment the following lines if you want to rollback the column rename
        // $table->renameColumn('new_name', 'old_name');
    }
};
