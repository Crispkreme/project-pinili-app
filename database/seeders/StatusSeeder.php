<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::create([
            'status' => 'pending',
        ]);
        Status::create([
            'status' => 'success',
        ]);
        Status::create([
            'status' => 'rejected,
        ]);
    }
}
