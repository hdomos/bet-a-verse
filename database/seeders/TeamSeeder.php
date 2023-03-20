<?php

namespace Database\Seeders;

use App\Models\Sport;
use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Sport::cursor() as $sport) {
            Team::factory()
                ->count(rand(2, 20))
                ->create([
                    'sport_id' => $sport->id,
                ]);
        }
    }
}
