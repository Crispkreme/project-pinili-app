<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Laboratory;

class LaboratorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Laboratory::create([
            'laboratory' => 'N/A',
            'description' => 'N/A',
            'price'      => '0',
        ]);
        Laboratory::create([
            'laboratory' => 'Medical Certificate',
            'description' => 'Medical Certificate',
            'price'      => '50',
        ]);
        Laboratory::create([
            'laboratory' => 'PF/Medical Worker',
            'description' => 'PF/Medical Worker',
            'price'      => '350',
        ]);
        Laboratory::create([
            'laboratory' => 'PWD Certificate',
            'description' => 'PWD Certificate',
            'price'      => '350',
        ]);
        Laboratory::create([
            'laboratory' => 'Senior Citizen Certificate',
            'description' => 'Senior Citizen Certificate',
            'price'      => '350',
        ]);
        Laboratory::create([
            'laboratory' => 'SSS Certificate',
            'description' => 'SSS Certificate',
            'price'      => '350',
        ]);
        Laboratory::create([
            'laboratory' => 'DSWD Certificate',
            'description' => 'DSWD Certificate',
            'price'      => '350',
        ]);
        Laboratory::create([
            'laboratory' => 'Small Wound Dressing',
            'description' => 'Small Wound Dressing',
            'price'      => '200',
        ]);
        Laboratory::create([
            'laboratory' => 'Medium Wound Dressing',
            'description' => 'Medium Wound Dressing',
            'price'      => '300',
        ]);
        Laboratory::create([
            'laboratory' => 'Big Wound Dressing',
            'description' => 'Big Wound Dressing',
            'price'      => '500',
        ]);
        Laboratory::create([
            'laboratory' => 'XL Wound Dressing',
            'description' => 'XL Wound Dressing',
            'price'      => '750',
        ]);
        Laboratory::create([
            'laboratory' => 'Antibiotic Cream (tube)',
            'description' => 'Antibiotic Cream (tube)',
            'price'      => '245',
        ]);
        Laboratory::create([
            'laboratory' => 'Nebulizer without Medicine',
            'description' => 'Nebulizer without Medicine',
            'price'      => '50',
        ]);
        Laboratory::create([
            'laboratory' => 'Nebulizer with Medicine',
            'description' => 'Nebulizer with Medicine',
            'price'      => '100',
        ]);
        Laboratory::create([
            'laboratory' => 'LABORATORY - BLOOD PRESSURE',
            'description' => 'LABORATORY - BLOOD PRESSURE',
            'price'      => '10',
        ]);
        Laboratory::create([
            'laboratory' => 'LABORATORY - WEIGHT',
            'description' => 'LABORATORY - WEIGHT',
            'price'      => '10',
        ]);
        Laboratory::create([
            'laboratory' => 'LABORATORY - CBC',
            'description' => 'LABORATORY - CBC',
            'price'      => '275',
        ]);
        Laboratory::create([
            'laboratory' => 'LABORATORY - HGT',
            'description' => 'LABORATORY - HGT',
            'price'      => '100',
        ]);
        Laboratory::create([
            'laboratory' => 'LABORATORY - LIPID PROFILE',
            'description' => 'LABORATORY - LIPID PROFILE',
            'price'      => '510',
        ]);
        Laboratory::create([
            'laboratory' => 'LABORATORY - CHOLESTEROL',
            'description' => 'LABORATORY - CHOLESTEROL',
            'price'      => '290',
        ]);
        Laboratory::create([
            'laboratory' => 'LABORATORY - TRIGLYCERIDE',
            'description' => 'LABORATORY - TRIGLYCERIDE',
            'price'      => '510',
        ]);
        Laboratory::create([
            'laboratory' => 'LABORATORY - BLOOD TYPING',
            'description' => 'LABORATORY - BLOOD TYPING',
            'price'      => '100',
        ]);
        Laboratory::create([
            'laboratory' => 'LABORATORY - SGPT',
            'description' => 'LABORATORY - SGPT',
            'price'      => '290',
        ]);
        Laboratory::create([
            'laboratory' => 'LABORATORY - SODIUM',
            'description' => 'LABORATORY - SODIUM',
            'price'      => '440',
        ]);
        Laboratory::create([
            'laboratory' => 'LABORATORY - POTASSIUM',
            'description' => 'LABORATORY - POTASSIUM',
            'price'      => '460',
        ]);
        Laboratory::create([
            'laboratory' => 'LABORATORY - BUN',
            'description' => 'LABORATORY - BUN',
            'price'      => '495',
        ]);
        Laboratory::create([
            'laboratory' => 'LABORATORY - CREATININE',
            'description' => 'LABORATORY - CREATININE',
            'price'      => '335',
        ]);
        Laboratory::create([
            'laboratory' => 'LABORATORY - SGPT',
            'description' => 'LABORATORY - SGPT',
            'price'      => '310',
        ]);
        Laboratory::create([
            'laboratory' => 'LABORATORY - HBsag',
            'description' => 'LABORATORY - HBsag',
            'price'      => '275',
        ]);
        Laboratory::create([
            'laboratory' => 'LABORATORY - URINALYSIS',
            'description' => 'LABORATORY - URINALYSIS',
            'price'      => '90',
        ]);
        Laboratory::create([
            'laboratory' => 'LABORATORY - PREGNANCY TEST',
            'description' => 'LABORATORY - PREGNANCY TEST',
            'price'      => '150',
        ]);
        Laboratory::create([
            'laboratory' => 'LABORATORY - FECALYSIS',
            'description' => 'LABORATORY - FECALYSIS',
            'price'      => '100',
        ]);
    }
}
