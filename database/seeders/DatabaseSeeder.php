<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CharacterSeeder::class,
            EpisodeSeeder::class,
            CharacterEpisodeSeeder::class,
            QuoteSeeder::class
        ]);
    }
}
