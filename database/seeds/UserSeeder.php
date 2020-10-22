<?php

use App\User;
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
        \App\User::create([
            'user_name' => "Motiur",
            'user_email' => "memotiur@gmail.com",
            'user_type' => "1",
            'password' => Hash::make('123456'),
            'role_id' => ('1'),
        ]);

        \App\User::create([
            'user_name' => "Sales man",
            'user_email' => "sales@pixonlab.com",
            'user_type' => "2",
            'password' => Hash::make('123456'),
            'role_id' => ('2'),
        ]);

    }
}
