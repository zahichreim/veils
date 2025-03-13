<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Message;
use App\Models\Promocode;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Message::factory()->count(10)->create();
        Promocode::factory()->count(10)->create();
    }
}
