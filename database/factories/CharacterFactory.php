<?php

namespace Database\Factories;

use App\Models\Character;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

class CharacterFactory extends Factory
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
        $jobList = [];
        $maxJob = random_int(3, 5);
        for ($job = 0; $job <= $maxJob; $job++) {
            $jobList[] = $this->faker->jobTitle;
        }

        return [
            'name' => $this->faker->name,
            'birthday' => $this->faker->date('Y-m-d', '2000-01-01'),
            'occupations' => $jobList,
            'img' => $this->faker->imageUrl(),
            'nickname' => $this->faker->lastName,
            'portrayed' => $this->faker->name,
        ];
    }
}
