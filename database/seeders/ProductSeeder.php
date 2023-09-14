<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'category_id' => 1,
            'form_id' => 2,
            'barcode' => 'PRD-20230914020028',
            'serial_number' => '',
            'medicine_name' => 'Paracetamol Advance',
            'generic_name' => 'Biogesic',
            'description' => 'For Flu',
        ]);
    }
}
