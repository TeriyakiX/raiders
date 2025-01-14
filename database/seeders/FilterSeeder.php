<?php

namespace Database\Seeders;

use App\Models\Filter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $filters = [
            ['type' => 'Rarity', 'value' => 'Common'],
            ['type' => 'Rarity', 'value' => 'Rare'],
            ['type' => 'Rarity', 'value' => 'Epic'],
            ['type' => 'Rarity', 'value' => 'Legendary'],

            ['type' => 'Gender', 'value' => 'Male'],
            ['type' => 'Gender', 'value' => 'Female'],

            ['type' => 'Clan', 'value' => 'Outcasts'],
            ['type' => 'Clan', 'value' => 'Hyenas'],
            ['type' => 'Clan', 'value' => 'Flawless'],
            ['type' => 'Clan', 'value' => 'Primals'],
            ['type' => 'Clan', 'value' => 'Valkyrles'],
            ['type' => 'Clan', 'value' => 'Gentlemen'],

            ['type' => 'Role', 'value' => 'Defender'],
            ['type' => 'Role', 'value' => 'Miner'],
            ['type' => 'Role', 'value' => 'Guard'],
            ['type' => 'Role', 'value' => 'Universal'],
        ];

        foreach ($filters as $filter) {
            Filter::create($filter);
        }
    }
}
