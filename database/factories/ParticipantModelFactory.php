<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ParticipantModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\ParticipantModel::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail,
            'dni' => $this->faker->unique()->randomNumber(8),
            'phone' => $this->faker->isbn10,
            'team_id' => $this->faker->numberBetween(1,  8),
            'objective' => $this->faker->text($maxNbChars = 250)
        ];
    }
}
