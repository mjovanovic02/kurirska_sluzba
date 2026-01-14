<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Klijent;
use App\Models\Kurir;
use App\Models\Menadzer;

class PosiljkaFactory extends Factory
{
    protected $model = \App\Models\Posiljka::class;

    public function definition()
    {
        $klijent = Klijent::inRandomOrder()->first();
        $kurir = Kurir::inRandomOrder()->first();
        $menadzer = Menadzer::inRandomOrder()->first();

        return [
            'klijent_id' => $klijent?->klijent_id ?? Klijent::factory(),
            'kurir_id' => $kurir?->kurir_id, // može biti null
            'menadzer_id' => $menadzer?->menadzer_id ?? Menadzer::factory(),
            'primaoc_ime' => $this->faker->name,
            'primaoc_adresa' => $this->faker->address,
            'tezina' => $this->faker->randomFloat(2, 0.1, 20),
            'broj_za_pracenje' => strtoupper($this->faker->bothify('???-#####')),
            'status' => $this->faker->randomElement(['kreirana', 'dodeljena', 'preuzeta', 'isporucena']),
        ];
    }
}
