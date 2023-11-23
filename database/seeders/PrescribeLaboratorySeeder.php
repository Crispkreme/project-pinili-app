<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PrescribeLaboratory;

class PrescribeLaboratorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PrescribeLaboratory::create([
            'laboratory_id' => 1,
            'quantity' => 0,
            'remarks' => "",
            'isActive' => 0,
        ]);
    }
}
