<?php

namespace Database\Seeders;

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
        // Seed default users
        $users = [
            [
                'name' => 'Sifuna Godfrey',
                'email' => 'info@suweka.com',
                'role' => 'admin',
            ],
            [
                'name' => 'Mary Wanjiku',
                'email' => 'mary@suweka.com',
                'role' => 'user',
            ],
            [
                'name' => 'John Mwangi',
                'email' => 'john@suweka.com',
                'role' => 'user',
            ],
            [
                'name' => 'Alice Atieno',
                'email' => 'alice@suweka.com',
                'role' => 'user',
            ],
            [
                'name' => 'David Otieno',
                'email' => 'david@suweka.com',
                'role' => 'user',
            ],
        ];

        foreach ($users as $user) {
            User::firstOrCreate(
                ['email' => $user['email']], // avoid duplicate seed
                [
                    'name'     => $user['name'],
                    'password' => Hash::make($user['email']), // password = email
                    'role'     => $user['role'],
                    'status'   => 'active',
                ]
            );
        }

        // Call other seeders
        $this->call([
            SettingsTableSeeder::class,
        ]);
    }
}
