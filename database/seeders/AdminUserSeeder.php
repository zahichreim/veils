<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Creates a default admin account used to log in to the /admin area.
     * Any authenticated user can reach the admin routes (there is no role
     * column), so this account is all that is required to manage the site.
     *
     * Login:  hawraa@veils.com  /  password
     * Change the password after the first login.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'hawraa@veils.com'],
            [
                'first_name' => 'Admin',
                'last_name' => 'User',
                'username' => 'admin',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
    }
}
