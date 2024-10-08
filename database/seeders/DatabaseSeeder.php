<?php

namespace Database\Seeders;

use App\Models\Announcement;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->has(
            Announcement::factory()->count(15),
        )->create([
            'name' => 'Aaron Barczewski',
            'password' => 'password',
            'email' => 'testmail@gmail.com',
        ]);
    }
}
