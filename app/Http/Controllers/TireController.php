<?php

namespace App\Http\Controllers;

use App\Tire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class TireController extends Controller
{
    protected $tire;
    function __construct(Tire $tire) {
       $this->tire = $tire;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tires = $this->tire->all();

        foreach ($tires as $tire) {
            $dataMerge[] = [
                'user' => $tire->user,
                'tire' => $tire,
            ];
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
            'tire_date'     => date('Y-m-d', strtotime($request->tireDate)),
            'tire_employee' => $request->tireEmployee,
            'type_of_tire'  => $request->typeOfTire,
            'brand_of_tire' => $request->brandOfTire,
            'price_per_unit'=> $request->pricePerUnit,
            'wage_per_unit' => $request->wagePerUnit,
            'photo_tire'    => $request->photoTire,
            'section_of_tire'=> $request->sectionOfTire,
            'row_of_tire'   => $request->rowOfTire,
            'number_of_tire'=> $request->numberOfTire,
            'quantity'      => $request->quantity,
            'total_distance'=> $request->totalDistance,
            'gas_per_distance'=> $request->gasPerDistance,
            'note'          => $request->note,

        ];
        $this->tire->create($params);
        
        return view('frontoffice.main');
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
