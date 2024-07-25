<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeagueSeeder extends Seeder
{
    /**
     * Заполнить базу данных начальными данными.
     *
     * @return void
     */
    public function run()
    {
        $leagues = [
            [
                'name' => 'League of Pioneers',
                'cups_from' => 0,
                'cups_to' => 10,
            ],
            [
                'name' => 'Novice League',
                'cups_from' => 11,
                'cups_to' => 20,
            ],
            [
                'name' => 'League of Daredevils',
                'cups_from' => 21,
                'cups_to' => 30,
            ],
            [
                'name' => 'League of Ambitions',
                'cups_from' => 31,
                'cups_to' => 40,
            ],
            [
                'name' => 'Expert League',
                'cups_from' => 41,
                'cups_to' => 60,
            ],
            [
                'name' => 'Master League',
                'cups_from' => 61,
                'cups_to' => 80,
            ],
            [
                'name' => 'League of Stars',
                'cups_from' => 81,
                'cups_to' => 100,
            ],
            [
                'name' => 'Veteran League',
                'cups_from' => 101,
                'cups_to' => 150,
            ],
            [
                'name' => 'Champions League',
                'cups_from' => 151,
                'cups_to' => 200,
            ],
            [
                'name' => 'Raiders League',
                'cups_from' => 201,
                'cups_to' => 999999,
            ],
        ];

        foreach ($leagues as $league) {
            DB::table('leagues')->updateOrInsert(
                ['name' => $league['name']], // Уникальное поле для проверки существования записи
                $league
            );
        }
    }
}
