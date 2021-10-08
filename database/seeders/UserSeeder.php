<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name'              => 'Test',
            'email'             => 'test@test.com',
            'password'           => \Hash::make('password'),
        ]);

        User::factory()->create([
            'name'              => 'Test User',
            'email'             => 'user@test.com',
            'password'           => \Hash::make('password'),
        ]);
    }
}
