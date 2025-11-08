<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'User1',
            'email' => 'user1@gmail.com',
            'password' => bcrypt('password123'),
        ]);

        User::factory()->create([
            'name' => 'User2',
            'email' => 'user2@gmail.com',
            'password' => bcrypt('password123'),
        ]);
    }
}
