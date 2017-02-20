<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintain extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'truck_driver',  
        'license_plate', 
        'maintain_date',  
        'maintain_employee',  
        'maintain_lists', 
        'wage_per_list',   
        'spare_per_list',  
        'total_wage',     
        'total_spare',    
        'amount_cost',    
        'note',          
    ];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'truck_driver' );
    }
    public function truck()
    {
        return $this->hasOne('App\Truck', 'id', 'license_plate' );
    }
}