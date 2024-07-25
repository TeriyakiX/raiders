<?php

namespace Database\Seeders;

use App\Models\Land;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $lands = [
            'Primals',
            'Gentlemen',
            'Immaculates',
            'Hyenas',
            'Valkyries',
            'City',
            'Village'
        ];

        foreach ($lands as $land) {
            Land::create(['name' => $land]);
        }
    }
}
