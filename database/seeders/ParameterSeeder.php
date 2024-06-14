<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParameterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $parameters = [
            ['name' => 'Initiative', 'level' => 'Normal'],
            ['name' => 'Movement speed', 'level' => 'Very low'],
            ['name' => 'Search diameter', 'level' => 'Very low'],
            ['name' => 'Laziness', 'level' => 'Normal'],
            ['name' => 'Search', 'level' => 'Low'],
            ['name' => 'Gather', 'level' => 'High'],
            ['name' => 'Combat diameter', 'level' => 'Normal'],
            ['name' => 'Damage', 'level' => 'Normal'],
            ['name' => 'Shield', 'level' => 'Normal'],
            ['name' => 'Health', 'level' => 'Normal'],
            ['name' => 'Cooldown', 'level' => 'High'],
        ];

        DB::table('parameters')->insert($parameters);
    }
}
