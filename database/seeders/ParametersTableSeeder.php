<?php

namespace Database\Seeders;

use App\Models\Parameter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParametersTableSeeder extends Seeder
{
    public function run(): void
    {
        $parameters = [
            ['trait_type' => 'Initiative'],
            ['trait_type' => 'Movement speed'],
            ['trait_type' => 'Search diameter'],
            ['trait_type' => 'Laziness'],
            ['trait_type' => 'Search'],
            ['trait_type' => 'Gather'],
            ['trait_type' => 'Combat diameter'],
            ['trait_type' => 'Damage'],
            ['trait_type' => 'Shield'],
            ['trait_type' => 'Health'],
        ];

        foreach ($parameters as $param) {
            Parameter::create($param);
        }
    }
}
