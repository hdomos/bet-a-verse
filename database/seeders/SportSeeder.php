<?php

namespace Database\Seeders;

use App\Models\Sport;
use Illuminate\Database\Seeder;

class SportSeeder extends Seeder
{
    public array $sports = [
        'Football',
        'Basketball',
        'Handball',
        'Volleyball',
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Sport::count() == null) {
            foreach ($this->sports as $sport) {
                Sport::create([
                    'name' => $sport,
                ]);
            }
        }
    }
}
