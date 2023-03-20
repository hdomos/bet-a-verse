<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $this->call(DatabaseSeeder::class);
        $this->call(TeamSeeder::class);
        $this->call(GameSeeder::class);
    }
}
