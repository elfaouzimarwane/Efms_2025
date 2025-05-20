<?php

namespace Database\Seeders;

use App\Models\Atelier;
use App\Models\Evenement;
use Illuminate\Database\Seeder;

class AtelierSeeder extends Seeder
{
    public function run()
    {
        $evenements = Evenement::all();

        Atelier::factory(10)->create([
            'evenement_id' => $evenements->random()->id,
        ]);
    }
}
