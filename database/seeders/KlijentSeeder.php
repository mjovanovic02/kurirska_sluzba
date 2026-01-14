<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Klijent;

class KlijentSeeder extends Seeder
{
    public function run(): void
    {
        Klijent::factory()->count(10)->create();
    }
}
