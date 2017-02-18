<?php

namespace App\Http\Controllers;

use App\Fuel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class FuelController extends Controller
{
    protected $fuel;
    function __construct(Fuel $fuel) {
        $this->fuel = $fuel;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $this->fuel;
        if ( $request->has('startDate') && $request->startDate != 'all' ) {
            $query = $query->where('fuel_date', '>=', $request->startDate);
        }
        if ( $request->has('endDate') && $request->endDate != 'all' ) {
            $query = $query->where('fuel_date', '<=', $request->endDate);            
        }

        $fuels = $query->get();
        $dataMerge = [];

        if( $request->has('truckDriver') && $request->truckDriver != 'all' ) {
            foreach ($fuels as $fuel) {
                if ($request->truckDriver == $fuel->user->id) {
                    $dataMerge[] = [
                        'user' => $fuel->user,
                        'truck' => $fuel->truck,
                        'fuel' => $fuel,
                    ];
                }
            }
        } else {
            foreach ($fuels as $fuel) {
                $dataMerge[] = [
                    'user' => $fuel->user,
                    'truck' => $fuel->truck,
                    'fuel' => $fuel,
                ];
            }
        }

        return response()->json($dataMerge);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = [
            'truck_driver'  => $request->truckDriver,
            'license_plate' => $request->licensePlate,
            'fuel_date'     => date('Y-m-d', strtotime($request->fuelDate)),
            'gas_employee'  => $request->gasEmployee,
            'gas_type'      => $request->gasType,
            'last_number_car' => $request->lastNumberCar,
            'present_number_car' => $request->presentNumberCar,
            'liter'         => $request->liter,
            'total_distance'=> $request->totalDistance,
            'gas_per_distance' => $request->gasPerDistance,
            'note'          => $request->note,
        ];
        
        $this->fuel->create($params);
        
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
    }
}
