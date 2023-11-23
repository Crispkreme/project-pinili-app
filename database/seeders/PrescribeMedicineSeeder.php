<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PrescribeMedicine;

class PrescribeMedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PrescribeMedicine::create([
            'product_id'=> 1,
            'srp'=> 0,
            'quantity'=> 0,
            'remarks'=> "",
            'isActive'=> 0,
        ]);
    }
}
