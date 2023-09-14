<?php

namespace Database\Seeders;

use App\Models\DrugClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DrugClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-09015814',
            'name' => 'Category',
            'description' => 'Category',
        ]);
        DrugClass::create([
            'classification_id' => 2,
            'id_number' => 'DRG-09015912',
            'name' => 'Form',
            'description' => 'Form',
        ]);
    }
}
