<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'id_number' => 'CMPY-09060355',
            'company_name' => 'MarvinCorps',
            'contact_number' => '091234567890',
            'landline' => '09225412231',
            'email' => 'marvincorps@gmail.com',
            'address' => 'GEneral Santos City',
        ]);
    }
}
