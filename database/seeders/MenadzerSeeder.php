<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menadzer;

class MenadzerSeeder extends Seeder
{
    public function run(): void
    {
        Menadzer::factory()->count(3)->create();
    }
}
