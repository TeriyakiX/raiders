<?php

namespace Database\Seeders;

use App\Models\Faction;
use App\Models\FactionLandInteraction;
use App\Models\Land;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FactionLandInteractionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Пример данных. В реальном приложении их нужно будет настроить.
        $interactions = [
            ['faction' => 'Primals', 'land' => 'Primals', 'effect' => '+', 'coefficient' => 1.5],
            ['faction' => 'Gentlemen', 'land' => 'Primals', 'effect' => '-', 'coefficient' => 1.2],
            ['faction' => 'Immaculates', 'land' => 'Primals', 'effect' => '=', 'coefficient' => 1],
            ['faction' => 'Hyenas', 'land' => 'Primals', 'effect' => '=', 'coefficient' => 1],
            ['faction' => 'Valkyries', 'land' => 'Primals', 'effect' => '-', 'coefficient' => 0.8],
            ['faction' => 'Outcasts', 'land' => 'Village', 'effect' => '+', 'coefficient' => 1.3],
            ['faction' => 'Outcasts', 'land' => 'City', 'effect' => '-', 'coefficient' => 1.3],
        ];

        foreach ($interactions as $interaction) {
            $faction = Faction::where('name', $interaction['faction'])->first();
            $land = Land::where('name', $interaction['land'])->first();

            FactionLandInteraction::create([
                'faction_id' => $faction->id,
                'land_id' => $land->id,
                'effect' => $interaction['effect'],
                'coefficient' => $interaction['coefficient'],
            ]);
        }
    }
}
