<?php

namespace Database\Seeders;

use App\Models\Faction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FactionsTableSeeder extends Seeder
{
    public function run()
    {
        $factions = [
            'Primals',
            'Gentlemen',
            'Immaculates',
            'Hyenas',
            'Valkyries',
            'Outcasts'
        ];

        foreach ($factions as $faction) {
            Faction::create(['name' => $faction]);
        }
    }
}
