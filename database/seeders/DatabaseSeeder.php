<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::create([
            'email'=>'admin@restro.com',
            'password'=>Hash::make('1234'),
            'user_role'=>'admin'
         ]);

    }
}
