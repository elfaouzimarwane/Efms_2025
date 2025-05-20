<?php

namespace Database\Factories;

use App\Models\Evenement;
use Illuminate\Database\Eloquent\Factories\Factory;

class EvenementFactory extends Factory
{
    protected $model = Evenement::class;

    public function definition()
    {
        return [
            'theme' => $this->faker->word,
            'description' => $this->faker->sentence,
            'date_debut' => $this->faker->date,
            'date_fin' => $this->faker->date,
            'cout_journalier' => $this->faker->randomFloat(2, 100, 1000),
            'expert_id' => null, // Will be set in the seeder
        ];
    }
}
