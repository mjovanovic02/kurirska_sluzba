<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MenadzerFactory extends Factory
{
    protected $model = \App\Models\Menadzer::class;

    public function definition()
    {
        return [
            'ime' => $this->faker->firstName,
            'prezime' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'lozinka' => bcrypt('password'),
        ];
    }
}
