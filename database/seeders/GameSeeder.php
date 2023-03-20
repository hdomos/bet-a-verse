<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Sport;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Sport::with('teams')->cursor() as $sport) {
            Game::factory()->count(50)
                ->state(new Sequence(
                    ['is_active' => false, 'is_finished' => false],
                    ['is_active' => true, 'is_finished' => false],
                    ['is_active' => false, 'is_finished' => true]
                ))
                ->create(['sport_id' => $sport->id]);
        }
    }
}
