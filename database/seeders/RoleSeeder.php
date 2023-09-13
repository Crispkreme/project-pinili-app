<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'role_name' => 'admin',
        ]);
        Role::create([
            'role_name' => 'cashier',
        ]);
        Role::create([
            'role_name' => 'checker',
        ]);
        Role::create([
            'role_name' => 'office',
        ]);
        Role::create([
            'role_name' => 'supplier',
        ]);
        Role::create([
            'role_name' => 'representative',
        ]);
        Role::create([
            'role_name' => 'manufacturer',
        ]);
        Role::create([
            'role_name' => 'wholesaler',
        ]);
    }
}
