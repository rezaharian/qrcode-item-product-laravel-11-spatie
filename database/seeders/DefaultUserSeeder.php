<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creating Super Admin User
        $superAdmin = User::create([
            'name' => 'Reza Harian S',
            'email' => 'reza@gmail.com',
            'password' => Hash::make('reza1234')
        ]);
        $superAdmin->assignRole('Super Admin');

        // Creating Admin User
        $admin = User::create([
            'name' => 'joko',
            'email' => 'joko@gmail.com',
            'password' => Hash::make('joko1234')
        ]);
        $admin->assignRole('Admin');

        // Creating Product Manager User
        $productManager = User::create([
            'name' => 'ikbal',
            'email' => 'ikbal@gmail.com',
            'password' => Hash::make('ikbal123')
        ]);
        $productManager->assignRole('Product Manager');

        // Creating Application User
        $user = User::create([
            'name' => 'budi',
            'email' => 'budi@gmail.com',
            'password' => Hash::make('budi1234')
        ]);
        $user->assignRole('User');
    }
}
