<?php

namespace Database\Seeders;

use App\Models\Character;
use App\Models\Character_Episode;
use App\Models\Episode;
use Illuminate\Database\Seeder;


class CharacterEpisodeSeeder extends Seeder
{
    public function run(): void
    {
        foreach ($this->getEpisode() as $episode){
            for($i = 0; $i < random_int(5, 15); $i++) {
                Character_Episode::create([
                    'episode_id' => $episode->id,
                    'character_id' => Character::inRandomOrder()->first()->id,
                ]);
            }
        }
    }

    public function getEpisode(): ?\Generator
    {
        foreach(Episode::all()  as $episode) {
            yield $episode;
        }
    }
}
