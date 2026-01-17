<?php

namespace Database\Seeders;

use App\Models\Conference;
use App\Models\Talk;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()
            ->has(Talk::factory()->count(5))
            ->create([
                'name' => 'Minh Le',
                'email' => 'minh_le01@yopmail.com',
                'password' => Hash::make('password'),
            ]);

        Conference::factory()->count(5)->create();
    }
}
