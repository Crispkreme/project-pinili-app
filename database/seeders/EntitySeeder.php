<?php

namespace Database\Seeders;

use App\Models\Entity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Entity::create([
            'role_id' => 1,
            'id_number' => 'USER-09060051',
            'name' => 'Marvin Ramos',
            'contact_number' => '',
            'address' => '09255411245',
            'role' => 'admin',
            'isActive' => 1,
        ]);
    }
}
