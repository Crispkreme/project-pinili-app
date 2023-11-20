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
            'form_id' => 1,
            'barcode' => '',
            'serial_number' => '',
            'medicine_name' => 'N/A',
            'generic_name' => 'N/A',
            'description' => 'N/A',
        ]);
        Product::create([
            'category_id' => 15,
            'form_id' => 2,
            'barcode' => 'PRD-20230222-083223',
            'serial_number' => '',
            'medicine_name' => 'Paracetamol Advance',
            'generic_name' => 'Biogesic',
            'description' => 'For Flu',
        ]);
        Product::create([
            'category_id' => 15,
            'form_id' => 2,
            'barcode' => 'PRD-20230222-083223',
            'serial_number' => '',
            'medicine_name' => 'ACECLOFENAC 100MG',
            'generic_name' => '-',
            'description' => 'ACECLOFENAC 100MG',
        ]);
        Product::create([
            'category_id' => 15,
            'form_id' => 2,
            'barcode' => 'PRD-20230222-083223',
            'serial_number' => '',
            'medicine_name' => 'ACICLOVIR 200MG',
            'generic_name' => '-',
            'description' => 'ACICLOVIR 200MG',
        ]);
        Product::create([
            'category_id' => 15,
            'form_id' => 2,
            'barcode' => 'PRD-20230222-083223',
            'serial_number' => '',
            'medicine_name' => 'ACETYLCYSTEINE 600MG',
            'generic_name' => '-',
            'description' => 'ACETYLCYSTEINE 600MG',
        ]);
        Product::create([
            'category_id' => 15,
            'form_id' => 2,
            'barcode' => 'PRD-20230222-083223',
            'serial_number' => '',
            'medicine_name' => 'ALLUMINUM MAGNESIUN LIQUID SACHET',
            'generic_name' => '-',
            'description' => 'ALLUMINUM MAGNESIUN LIQUID SACHET',
        ]);
        Product::create([
            'category_id' => 15,
            'form_id' => 2,
            'barcode' => 'PRD-20230222-083223',
            'serial_number' => '',
            'medicine_name' => 'ALLUMINUM MAGNESIUN TABLET',
            'generic_name' => '-',
            'description' => 'ALLUMINUM MAGNESIUN TABLET',
        ]);
        Product::create([
            'category_id' => 15,
            'form_id' => 2,
            'barcode' => 'PRD-20230222-083223',
            'serial_number' => '',
            'medicine_name' => 'AMBROXOL 30MG TABLET',
            'generic_name' => '-',
            'description' => 'AMBROXOL 30MG TABLET',
        ]);
        Product::create([
            'category_id' => 15,
            'form_id' => 2,
            'barcode' => 'PRD-20230222-083223',
            'serial_number' => '',
            'medicine_name' => 'AMLODIPINE + LOSARTAN TAB 50MG/5MG',
            'generic_name' => '-',
            'description' => 'AMLODIPINE + LOSARTAN TAB 50MG/5MG',
        ]);
        Product::create([
            'category_id' => 15,
            'form_id' => 2,
            'barcode' => 'PRD-20230222-083223',
            'serial_number' => '',
            'medicine_name' => 'ATORVASTATI + AMLODIPINE 10MG/5MG TAB',
            'generic_name' => '-',
            'description' => 'ATORVASTATI + AMLODIPINE 10MG/5MG TAB',
        ]);
        Product::create([
            'category_id' => 15,
            'form_id' => 2,
            'barcode' => 'PRD-20230222-083223',
            'serial_number' => '',
            'medicine_name' => 'AZITHROMYCIN 500MG TAB',
            'generic_name' => '-',
            'description' => 'AZITHROMYCIN 500MG TAB',
        ]);
        Product::create([
            'category_id' => 15,
            'form_id' => 2,
            'barcode' => 'PRD-20230222-083223',
            'serial_number' => '',
            'medicine_name' => 'CHLORAMPHENICOL 500MG CAP',
            'generic_name' => '-',
            'description' => 'CHLORAMPHENICOL 500MG CAP',
        ]);
        Product::create([
            'category_id' => 15,
            'form_id' => 2,
            'barcode' => 'PRD-20230222-083223',
            'serial_number' => '',
            'medicine_name' => 'COTRIMOXAZOLE800MG TAB',
            'generic_name' => '-',
            'description' => 'COTRIMOXAZOLE800MG TAB',
        ]);
        Product::create([
            'category_id' => 15,
            'form_id' => 2,
            'barcode' => 'PRD-20230222-083223',
            'serial_number' => '',
            'medicine_name' => 'LEVOCETIRIZINE+ MONTELUKAST TAB 10MG',
            'generic_name' => '-',
            'description' => 'LEVOCETIRIZINE+ MONTELUKAST TAB 10MG',
        ]);
        Product::create([
            'category_id' => 15,
            'form_id' => 2,
            'barcode' => 'PRD-20230222-083223',
            'serial_number' => '',
            'medicine_name' => 'LEVOCETIRIZINE+BETHAMETASONE TAB 10MG',
            'generic_name' => '-',
            'description' => 'LEVOCETIRIZINE+BETHAMETASONE TAB 10MG',
        ]);
        Product::create([
            'category_id' => 15,
            'form_id' => 2,
            'barcode' => 'PRD-20230222-083223',
            'serial_number' => '',
            'medicine_name' => 'POTASSIUM CHLORIDE 750MG TAB',
            'generic_name' => '-',
            'description' => 'POTASSIUM CHLORIDE 750MG TAB',
        ]);
        Product::create([
            'category_id' => 15,
            'form_id' => 2,
            'barcode' => 'PRD-20230222-083223',
            'serial_number' => '',
            'medicine_name' => 'SYLIMARIN + B COMPLEX SOFTGEL',
            'generic_name' => '-',
            'description' => 'SYLIMARIN + B COMPLEX SOFTGEL',
        ]);
    }
}
