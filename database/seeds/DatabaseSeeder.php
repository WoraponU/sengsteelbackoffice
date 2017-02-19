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
                'license_plate' => 123,
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
            ],
            
        ];

        $dataFuel = [
            [
                'truck_driver'  => 1,
                'license_plate' => 123,
                'fuel_date' => '2017-02-12',
                'gas_employee'  => 'test',
                'gas_type'  => 'gasoline',
                'last_number_car'   => 123,
                'present_number_car'    => 1235,
                'liter' => 3,
                'total_distance'    => 4,
                'gas_per_distance'  => 3,
                'note'  => 'test',
            ],  
        ];

        $dataFuel = [
            [
                'truck_driver'  => 1,
                'license_plate' => 123,
                'fuel_date' => '2017-02-12',
                'gas_employee'  => 'test',
                'gas_type'  => 'gasoline',
                'last_number_car'   => 123,
                'present_number_car'    => 1235,
                'liter' => 3,
                'total_distance'    => 4,
                'gas_per_distance'  => 3,
                'note'  => 'test',
            ],  
        ];

        $dataTire = [
            [
                'truck_driver'  => 1,
                'license_plate' => 123,
                'tire_date' => '2017-02-12',
                'tire_employee' => 'test',
                'type_of_tire'  => 'test',
                'brand_of_tire' => 'test',
                'price_per_unit'    => 3,
                'wage_per_unit' => 3,
                'photo_tire'    => '/images/tire_icon.png',
                'section_of_tire'   => 'parent',
                'row_of_tire'   => 1,
                'number_of_tire'    => 1,
                'quantity'  => 1,
                'total_tire_price'  => 1,
                'total_amout_cost'  => 1,
                'note'  => 'test',
            ],  
        ];

        $dataMaintain = [
            [
                'truck_driver'  => 1,  
                'license_plate' => 123, 
                'maintain_date' => '2017-02-12',  
                'maintain_employee' => 'test',  
                'maintain_lists'    => '["a","b"]', 
                'wage_per_list' => '["1","2"]',   
                'spare_per_list'    => '["1","2"]',  
                'total_wage'    => 1,     
                'total_spare'   => 1,    
                'amount_cost'   => 1,    
                'note'  => 'test',      
            ],  
        ];


        DB::table('users')->insert($dataUser);
        DB::table('trucks')->insert($dataTruck);
        DB::table('fuels')->insert($dataFuel);
        DB::table('tires')->insert($dataTire);
        DB::table('maintains')->insert($dataMaintain);
    }
}
