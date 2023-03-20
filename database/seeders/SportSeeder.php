<?php

namespace Database\Seeders;

use App\Models\Sport;
use Illuminate\Database\Seeder;

class SportSeeder extends Seeder
{
    public array $sports = [
        ['Football', 'fa-solid fa-futbol'],
        ['Basketball', 'fa-solid fa-basketball'],
        ['Handball', 'fa-solid fa-circle'],
        ['Volleyball', 'fa-solid fa-volleyball'],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Sport::count() == null) {
            foreach ($this->sports as $sport) {
                Sport::create([
                    'name' => $sport[0],
                    'icon' => $sport[1],
                ]);
            }
        }
    }
}
