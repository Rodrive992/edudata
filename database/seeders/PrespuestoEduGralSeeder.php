<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PrespuestoEduGral;

class PrespuestoEduGralSeeder extends Seeder
{
    public function run(): void
    {
        PrespuestoEduGral::factory()->count(100)->create();
    }
}
