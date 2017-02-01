<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'license_plate',
        'owner',
        'photo',
        'register_date',
        'annual_tax_date',
        'gasoline',
        'lubricator',
        'gear_box_oil',
        'final_gear_oil',
        'number_of_wheel',
        'row_of_wheel',
        'last_number_car',
    ];
}
