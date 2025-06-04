<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin 1',
                'email' => 'admin1@gmail.com',
                'password' => 'p@ssw0rd'
            ],
            [
                'name' => 'Admin 2',
                'email' => 'admin2@gmail.com',
                'password' => 'p@ssw0rd'
            ],
            [
                'name' => 'Admin 3',
                'email' => 'admin3@gmail.com',
                'password' => 'p@ssw0rd'
            ]
        ];

        foreach($users as $user) {
            User::updateOrCreate([
                'email' => $user['email']
            ],[
                'name' => $user['name'],
                'password' => Hash::make($user['password'])
            ]);
        }
    }
}
