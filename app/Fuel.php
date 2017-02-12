<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fuel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'truck_driver',
        'license_plate',
        'fuel_date',
        'gas_employee',
        'gas_type',
        'last_number_car',
        'present_number_car',
        'liter',
        'total_distance',
        'gas_per_distance',
        'note',
    ];
}