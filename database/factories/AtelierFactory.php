<?php

namespace Database\Factories;

use App\Models\Atelier;
use Illuminate\Database\Eloquent\Factories\Factory;

class AtelierFactory extends Factory
{
    protected $model = Atelier::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->word,
            'evenement_id' => null, // Will be set in the seeder
        ];
    }
}
