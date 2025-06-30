<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Usuario Admin fijo
        User::create([
            'name' => 'Administrador Principal',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin123'), 
            'dependencia' => 'Dirección General',
            'sub_dependencia' => 'Oficina Central',
            'role' => 'admin',
            'remember_token' => \Str::random(10),
        ]);

        // 10 usuarios aleatorios usando el Factory
        User::factory(10)->create();
    }
}