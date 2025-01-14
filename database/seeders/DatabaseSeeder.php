<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(LeagueSeeder::class);
        $this->call(FactionsTableSeeder::class);
        $this->call(LandsTableSeeder::class);
        $this->call(FactionLandInteractionsTableSeeder::class);
        $this->call(FilterSeeder::class);
    }
}
