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
            'role_id'        => 1,
            'name'           => 'Administrator Account',
            'username'       => 'admin',
            'email'          => 'admin@admin.com',
            'password'       => Hash::make('admin'),
            'contact_number' => '09380276146',
            'position'       => 'admin',
            'isActive'       => 1,
            'address'        => 'General Santos City',
            'profile_image'  => '',
        ]);
        User::create([
            'role_id'        => 1,
            'name'           => 'Administrator Account',
            'username'       => 'ep.admin',
            'email'          => 'ep.admin@admin.com',
            'password'       => Hash::make('ep.admin'),
            'contact_number' => '09380276146',
            'position'       => 'admin',
            'isActive'       => 1,
            'address'        => 'General Santos City',
            'profile_image'  => '',
        ]);
        User::create([
            'role_id'        => 2,
            'name'           => 'Manager Account',
            'username'       => 'maricel.manager',
            'email'          => 'maricel@manager.com',
            'password'       => Hash::make('ep.manager'),
            'contact_number' => '09380276146',
            'position'       => 'manager',
            'isActive'       => 1,
            'address'        => 'General Santos City',
            'profile_image'  => '',
        ]);
        User::create([
            'role_id'        => 3,
            'name'           => 'Clerk Account',
            'username'       => 'clerk01.manager',
            'email'          => 'clerk01@admin.com',
            'password'       => Hash::make('clerk01.admin'),
            'contact_number' => '09380276146',
            'position'       => 'admin',
            'isActive'       => 1,
            'address'        => 'General Santos City',
            'profile_image'  => '',
        ]);
        User::create([
            'role_id'        => 3,
            'name'           => 'Clerk Account',
            'username'       => 'clerk02.manager',
            'email'          => 'clerk02@admin.com',
            'password'       => Hash::make('clerk02.admin'),
            'contact_number' => '09380276146',
            'position'       => 'admin',
            'isActive'       => 1,
            'address'        => 'General Santos City',
            'profile_image'  => '',
        ]);
        User::create([
            'role_id'        => 4,
            'name'           => 'Labtech Account',
            'username'       => 'labtech.manager',
            'email'          => 'labtech@admin.com',
            'password'       => Hash::make('labtech.admin'),
            'contact_number' => '09380276146',
            'position'       => 'admin',
            'isActive'       => 1,
            'address'        => 'General Santos City',
            'profile_image'  => '',
        ]);
    }
}
