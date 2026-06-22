<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Message;
use App\Models\Promocode;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Required for the site to render: admin login, settings keys, the 2 categories.
        $this->call([
            AdminUserSeeder::class,
            SettingsSeeder::class
        ]);
    }
}
