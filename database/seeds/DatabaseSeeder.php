<?php

use App\Outlet;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    function run()
        {
            Outlet::create([
                'outlet_name' => "OuletOne",
                'outlet_phone' => "01714258963",
                'outlet_address' => "Mirpur, Dhaka",
                'outlet_image' => "outlet.png"
            ]);
            DB::table('users')->insert([
                'user_name' => "Motiur Rahaman",
                'user_email' => "memotiur@gmail.com",
                'user_phone' => "01717849968",
                'user_type' => "1",
                'password' =>Hash::make('123456'),
                'role_id' =>('1'),
            ]);

            DB::table('vats')->insert([
                'vat_rate' => "10",
                'comments' => ".."
            ]);



            DB::table('customers')->insert([
                'customer_name' => "Monjurul Huda Munna",
                'customer_phone' => "017174456",
                'outlet_id' => "1"
            ]);
        }

}
