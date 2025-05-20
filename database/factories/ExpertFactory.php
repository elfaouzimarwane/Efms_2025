<?php

namespace Database\Factories;

use App\Models\Expert;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExpertFactory extends Factory
{
    protected $model = Expert::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->lastName,
            'prenom' => $this->faker->firstName,
            'specialite' => $this->faker->jobTitle,
        ];
    }
}
