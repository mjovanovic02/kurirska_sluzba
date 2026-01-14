<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Posiljka;

class PosiljkaSeeder extends Seeder
{
    public function run(): void
    {
        Posiljka::factory()->count(20)->create();
    }
}
