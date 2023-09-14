<?php

namespace Database\Seeders;

use App\Models\Distributor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistributorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Distributor::create([
            'id_number' => 'DST-09060634',
            'entity_id' => 1,
            'company_id' => 1,
            'isActive' => 1,
        ]);
    }
}
