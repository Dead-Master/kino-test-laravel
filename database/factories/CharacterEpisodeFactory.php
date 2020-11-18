<?php

namespace Database\Factories;

use App\Models\Character;
use App\Models\Episode;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

class CharacterEpisodeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Character::class;

    /**
     * Define the model's default state.
     * @return array
     * @throws Exception
     */
    public function definition() :array
    {
        return [
            'episode_id' => Episode::all()->random()->id,
            'character_id' => Character::all()->random(1)->id,
        ];
    }
}
