<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'role_id'        => '1',
            'name'           => 'Administrator Account',
            'username'       => 'admin',
            'email'          => 'admin@admin.com',
            'password'       => Hash::make('admin'),
            'contact_number' => '0926123227',
            'position'       => 'admin',
            'isActive'       => '1',
            'profile_image'  => '',
        ]);
        User::create([
            'role_id'        => '2',
            'name'           => 'Cashier Account',
            'username'       => 'cashier',
            'email'          => 'cashier@cashier.com',
            'password'       => Hash::make('cashier'),
            'contact_number' => '0926123227',
            'position'       => 'cashier',
            'isActive'       => '1',
            'profile_image'  => '',
        ]);
        User::create([
            'role_id'        => '3',
            'name'           => 'Checker Account',
            'username'       => 'checker',
            'email'          => 'checker@checker.com',
            'password'       => Hash::make('checker'),
            'contact_number' => '0926123227',
            'position'       => 'checker',
            'isActive'       => '1',
            'profile_image'  => '',
        ]);
        User::create([
            'role_id'        => '4',
            'name'           => 'Office Clerk Account',
            'username'       => 'clerk',
            'email'          => 'clerk@clerk.com',
            'password'       => Hash::make('clerk'),
            'contact_number' => '0926123227',
            'position'       => 'clerk',
            'isActive'       => '1',
            'profile_image'  => '',
        ]);
    }
}
