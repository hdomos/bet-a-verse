<?php

namespace Database\Factories;

use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'placeholder',
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (Game $game) {
            [$team1, $team2] = $game->sport->teams->random(2);

            $game->fill([
                'name' => Str::of($team1->name)->upper()->limit(3, '').' - '.Str::of($team2->name)->upper()->limit(3, '').' at '.$this->faker->city(),
            ]);

            if ($game->is_finished) {
                $winnerScore = rand(1, 10);
                $loserScore = rand(0, $winnerScore - 1);

                // Team1 is winner for simplicity's sake
                $game->teams()->attach($team1, ['is_winner' => true, 'score' => $winnerScore]);
                $game->teams()->attach($team1, ['is_winner' => false, 'score' => $loserScore]);

                $game->fill(['winner_team_id' => $team1->id]);
            } else {
                $game->teams()->attach($team1);
                $game->teams()->attach($team2);
            }

            $game->save();
        });
    }
}
