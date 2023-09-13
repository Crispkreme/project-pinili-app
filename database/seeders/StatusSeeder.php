<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            'status' => 'rejected',
        ]);
    }
}
