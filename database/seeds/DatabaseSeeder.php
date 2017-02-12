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
        $dataUser = [
            [
                'firstname' => 'worapon',
                'lastname'  => 'prathuangthip',
                'identification_number' => '1729900255676',
                'driver_license' => '12345',
                'phone' => '0824965325',
                'email' => 'worapon@outlook.com',
                'photo' => '/images/user_icon.png',
                'address' => '85 moo.5',
                'role' => 'truck_driver',
                'username' => '',
                'password' => '',
            ],
            
        ];

        $dataTruck = [
            [
                'license_plate' => '123',
                'owner' => 'worapon',
                'photo' => '/images/truck_icon.png',
                'register_date' => '2017-02-12',
                'annual_tax_date'   => '2017-02-12',
                'gasoline'  => 'gasoline',
                'lubricator'    => 'lubricator',
                'gear_box_oil'  => 'gear_box_oil',
                'final_gear_oil'    => 'final_gear_oil',
                'number_wheel_per_row'  => '2',
                'row_of_wheel'  => '2',
                'last_number_car'   => '1000',
            ],
            
        ];

        DB::table('users')->insert($dataUser);
        DB::table('trucks')->insert($dataTruck);
    }
}
