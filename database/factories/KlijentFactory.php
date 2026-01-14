<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class KlijentFactory extends Factory
{
    protected $model = \App\Models\Klijent::class;

    public function definition()
    {
        return [
            'ime' => $this->faker->firstName,
            'prezime' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'telefon' => $this->faker->phoneNumber,
            'lozinka' => bcrypt('password'), // default lozinka
            'adresa' => $this->faker->address,
        ];
    }
}
