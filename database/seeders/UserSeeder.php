<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@simpadu.test',
            'password' => Hash::make('admin123'),
            'role' => '1', //admin
        ]);

        User::create([
            'name' => 'Petugas',
            'email' => 'petugas@simpadu.test',
            'password' => Hash::make('petugas123'),
            'role' => '2', //petugas
        ]);

        User::create([
            'name' => 'Pimpinan',
            'email' => 'pimpinan@simpadu.test',
            'password' => Hash::make('pimpinan123'),
            'role' => '3', //pimpinan
        ]);
    }
}
