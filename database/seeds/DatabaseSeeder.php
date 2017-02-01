<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datauser = [
            [
                'firstname' => 'worapon',
                'lastname'  => 'prathuangthip',
                'identification_number' => '1729900255676',
                'driver_license' => '12345',
                'phone' => '0824965325',
                'email' => 'worapon@outlook.com',
                'photo' => '/images/user_icon.png',
                'address' => '85 moo.5',
                'role' => 'truck',
                'username' => '',
                'password' => '',
            ],
            
        ];

        DB::table('users')->insert($datauser);
    }
}
