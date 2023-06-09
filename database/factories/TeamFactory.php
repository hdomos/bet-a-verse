<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->city.' '.$this->faker->word;

        return [
            'name' => $name,
            'logo_url' => $this->faker->image(dir: 'public/storage/teams', fullPath: false, category: $name),
        ];
    }
}
