<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KurirFactory extends Factory
{
    protected $model = \App\Models\Kurir::class;

    public function definition()
    {
        return [
            'ime' => $this->faker->firstName,
            'prezime' => $this->faker->lastName,
            'lozinka' => bcrypt('password'),
            'broj_vozila' => $this->faker->bothify('???-####'),
            'status' => $this->faker->randomElement(['aktivan', 'neaktivan']),
        ];
    }
}
