<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['name' => 'Dicky', 'quota' => 3],
            ['name' => 'Ziyad', 'quota' => 5],
            ['name' => 'Alya', 'quota' => 0],
            ['name' => 'Rizky', 'quota' => 4],
            ['name' => 'Fahmi', 'quota' => 3],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
