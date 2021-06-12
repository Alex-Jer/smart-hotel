<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin Example',
                'email' => 'admin@admin',
                'email_verified_at' => now(),
                'password' => Hash::make('admin321'),
                'remember_token' => Str::random(10),
            ]
        ];

        User::insert($users);
    }
}
