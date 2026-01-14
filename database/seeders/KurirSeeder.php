<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kurir;

class KurirSeeder extends Seeder
{
    public function run(): void
    {
        Kurir::factory()->count(5)->create();
    }
}
