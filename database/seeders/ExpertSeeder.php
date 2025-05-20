<?php

namespace Database\Seeders;

use App\Models\Expert;
use Illuminate\Database\Seeder;

class ExpertSeeder extends Seeder
{
    public function run()
    {
        Expert::factory(10)->create();
    }
}
