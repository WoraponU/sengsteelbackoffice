<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tire extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'truck_driver',
        'license_plate',
        'tire_date',
        'tire_employee',
        'type_of_tire',
        'brand_of_tire',
        'price_per_unit',
        'wage_per_unit',
        'photo_tire',
        'section_of_tire',
        'row_of_tire',
        'number_of_tire',
        'quantity',
        'total_distance',
        'gas_per_distance',
        'note',
    ];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'truck_driver' );
    }
}