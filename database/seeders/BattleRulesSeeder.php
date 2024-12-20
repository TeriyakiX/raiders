<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BattleRulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('battle_rules')->insert([
            [
                'level_difference' => -9,
                'victim_frozen_duration' => 10,
                'attacker_frozen_duration' => 10,
                'attacker_win_cups' => 100,
                'attacker_lose_cups' => -1,
                'victim_win_cups' => 1,
                'victim_lose_cups' => -14,
            ],
            [
                'level_difference' => -8,
                'victim_frozen_duration' => 10,
                'attacker_frozen_duration' => 10,
                'attacker_win_cups' => 80,
                'attacker_lose_cups' => -1,
                'victim_win_cups' => 1,
                'victim_lose_cups' => -28,
            ],
            [
                'level_difference' => -7,
                'victim_frozen_duration' => 10,
                'attacker_frozen_duration' => 10,
                'attacker_win_cups' => 70,
                'attacker_lose_cups' => -1,
                'victim_win_cups' => 1,
                'victim_lose_cups' => -24,
            ],
            [
                'level_difference' => -6,
                'victim_frozen_duration' => 10,
                'attacker_frozen_duration' => 10,
                'attacker_win_cups' => 50,
                'attacker_lose_cups' => -1,
                'victim_win_cups' => 1,
                'victim_lose_cups' => -20,
            ],
            [
                'level_difference' => -5,
                'victim_frozen_duration' => 10,
                'attacker_frozen_duration' => 10,
                'attacker_win_cups' => 40,
                'attacker_lose_cups' => -1,
                'victim_win_cups' => 1,
                'victim_lose_cups' => -14,
            ],
            [
                'level_difference' => -4,
                'victim_frozen_duration' => 10,
                'attacker_frozen_duration' => 10,
                'attacker_win_cups' => 25,
                'attacker_lose_cups' => -1,
                'victim_win_cups' => 1,
                'victim_lose_cups' => -10,
            ],
            [
                'level_difference' => -3,
                'victim_frozen_duration' => 10,
                'attacker_frozen_duration' => 10,
                'attacker_win_cups' => 15,
                'attacker_lose_cups' => -1,
                'victim_win_cups' => 1,
                'victim_lose_cups' => -8,
            ],
            [
                'level_difference' => -2,
                'victim_frozen_duration' => 10,
                'attacker_frozen_duration' => 10,
                'attacker_win_cups' => 8,
                'attacker_lose_cups' => -1,
                'victim_win_cups' => 1,
                'victim_lose_cups' => -6,
            ],
            [
                'level_difference' => -1,
                'victim_frozen_duration' => 10,
                'attacker_frozen_duration' => 10,
                'attacker_win_cups' => 2,
                'attacker_lose_cups' => -1,
                'victim_win_cups' => 1,
                'victim_lose_cups' => -4,
            ],
            [
                'level_difference' => 0,
                'victim_frozen_duration' => 10,
                'attacker_frozen_duration' => 10,
                'attacker_win_cups' => 1,
                'attacker_lose_cups' => -1,
                'victim_win_cups' => 1,
                'victim_lose_cups' => -2,
            ],
            [
                'level_difference' => 1,
                'victim_frozen_duration' => 10,
                'attacker_frozen_duration' => 10,
                'attacker_win_cups' => 1,
                'attacker_lose_cups' => -2,
                'victim_win_cups' => 1,
                'victim_lose_cups' => -1,
            ],
            [
                'level_difference' => 2,
                'victim_frozen_duration' => 10,
                'attacker_frozen_duration' => 10,
                'attacker_win_cups' => 1,
                'attacker_lose_cups' => -4,
                'victim_win_cups' => 2,
                'victim_lose_cups' => -1,
            ],
            [
                'level_difference' => 3,
                'victim_frozen_duration' => 10,
                'attacker_frozen_duration' => 10,
                'attacker_win_cups' => 1,
                'attacker_lose_cups' => -6,
                'victim_win_cups' => 8,
                'victim_lose_cups' => -1,
            ],
            [
                'level_difference' => 4,
                'victim_frozen_duration' => 10,
                'attacker_frozen_duration' => 10,
                'attacker_win_cups' => 1,
                'attacker_lose_cups' => -8,
                'victim_win_cups' => 15,
                'victim_lose_cups' => -1,
            ],
            [
                'level_difference' => 5,
                'victim_frozen_duration' => 10,
                'attacker_frozen_duration' => 10,
                'attacker_win_cups' => 1,
                'attacker_lose_cups' => -10,
                'victim_win_cups' => 25,
                'victim_lose_cups' => -1,
            ],
            [
                'level_difference' => 6,
                'victim_frozen_duration' => 10,
                'attacker_frozen_duration' => 10,
                'attacker_win_cups' => 1,
                'attacker_lose_cups' => -14,
                'victim_win_cups' => 40,
                'victim_lose_cups' => -1,
            ],
            [
                'level_difference' => 7,
                'victim_frozen_duration' => 10,
                'attacker_frozen_duration' => 10,
                'attacker_win_cups' => 1,
                'attacker_lose_cups' => -20,
                'victim_win_cups' => 50,
                'victim_lose_cups' => -1,
            ],
            [
                'level_difference' => 8,
                'victim_frozen_duration' => 10,
                'attacker_frozen_duration' => 10,
                'attacker_win_cups' => 1,
                'attacker_lose_cups' => -24,
                'victim_win_cups' => 70,
                'victim_lose_cups' => -1,
            ],
            [
                'level_difference' => 9,
                'victim_frozen_duration' => 10,
                'attacker_frozen_duration' => 10,
                'attacker_win_cups' => 1,
                'attacker_lose_cups' => -28,
                'victim_win_cups' => 80,
                'victim_lose_cups' => -1,
            ]
        ]);
    }
}
