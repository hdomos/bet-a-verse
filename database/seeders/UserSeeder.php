<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (User::query()->count() == 0) {
            User::create([
                'id' => 1,
                'name' => 'Admin',
                'email' => 'hdomos@gmail.com',
                'password' => Hash::make('Password1234'),
                'is_admin' => true,
            ]);
        }
    }
}
