<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(StatusSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(GenderSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ClassificationSeeder::class);
        $this->call(DrugClassSeeder::class);
        $this->call(EntitySeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(DistributorSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(LaboratorySeeder::class);
    }
}
