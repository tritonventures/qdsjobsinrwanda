<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'names' => 'Admin user',
            'email' => 'admin@test.com',
            'phone_number' => '0784566566',
            'user_type' => 'admin',
            'password' => Hash::make("password"),
        ]);
        User::factory()->create([
            'names' => 'Candidate user',
            'email' => 'candidate@test.com',
            'phone_number' => '0784566567',
            'user_type' => 'candidate',
            'password' => Hash::make("password"),
        ]);
    }
}
