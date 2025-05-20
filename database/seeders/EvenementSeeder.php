<?php

namespace Database\Seeders;

use App\Models\Evenement;
use App\Models\Expert;
use Illuminate\Database\Seeder;

class EvenementSeeder extends Seeder
{
    public function run()
    {
        $experts = Expert::all();

        Evenement::factory(10)->create([
            'expert_id' => $experts->random()->id,
        ]);
    }
}
