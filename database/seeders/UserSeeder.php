<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

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
                'name' => 'Test User - 1',
                'email' => 'testuser1@gmail.com',
                'password' => Hash::make('testPassword'),
                'family_id' => 1,
                'created_at' => Carbon::now(),                
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Test User - 2',
                'email' => 'testuser2@gmail.com',
                'password' => Hash::make('testPassword'),
                'family_id' => 1,
                'created_at' => Carbon::now(),                
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Test User - 3',
                'email' => 'testuser3@gmail.com',
                'password' => Hash::make('testPassword'),
                'family_id' => 2,
                'created_at' => Carbon::now(),                
                'updated_at' => Carbon::now()
            ]
        ];

        User::insert($users);
    }
}
