<?php

namespace Database\Seeders;

use App\Models\Character;
use App\Models\Quote;
use Illuminate\Database\Seeder;


class QuoteSeeder extends Seeder
{
    public function run(): void
    {
        foreach ($this->getCharacter() as $character) {
            Quote::factory()->count(random_int(3, 7))->create([
                'character_id' => $character->id,
                'episode_id' =>  $character->episodes()->inRandomOrder()->first()->id
            ]);
        }
    }

    public function getCharacter(): ?\Generator
    {
        foreach(Character::has('episodes')->get()  as $character) {
            yield $character;
        }
    }

}
