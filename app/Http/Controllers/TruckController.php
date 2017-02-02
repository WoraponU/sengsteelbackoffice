<?php

namespace App\Http\Controllers;

use App\Truck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Carbon\Carbon;

class TruckController extends Controller
{
    protected $truck;
    function __construct(Truck $truck) {
        $this->truck = $truck;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->truck->all());
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
        // $validator = $this->validate($request, [
        //     'identificationNumber' => 'unique:users,identification_number|numeric',
        //     'phone' => 'numeric',
        // ]);

        $params = [
            'license_plate'	=> $request->licensePlate,
			'owner'	=> $request->owner,
			'photo'	=> $request->photo,
			'register_date'	=> date('Y-m-d', strtotime($request->registerDate)),
			'annual_tax_date'	=> date('Y-m-d', strtotime($request->annualTaxDate)),
			'gasoline'	=> $request->gasoline,
			'lubricator'	=> $request->lubricator,
			'gear_box_oil'	=> $request->gearBoxOil,
			'final_gear_oil'	=> $request->finalGearOil,
			'last_number_car'	=> $request->lastNumberCar,
			'row_of_wheel'	=> $request->rowOfWheel,
			'number_wheel_per_row'	=> json_encode($request->numberWheelPerRow),
        ];
		// dd($params);
        $this->truck->create($params);
        
        return view('backoffice.main');
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
        // return response()->json($this->truck->find($id));
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
        // $validator = $this->validate($request, [
        //     'identificationNumber' => 'numeric',
        //     'phone' => 'numeric',
        // ]);

        // $params = [
        //     'firstname' => $request->firstname,
        //     'lastname'  => $request->lastname,
        //     'identification_number' => $request->identificationNumber,
        //     'driver_license' => $request->driverLicense,
        //     'email'     => $request->email,
        //     'phone'       => $request->phone,
        //     'photo'     => $request->photo,
        //     'address'   => $request->address,
        //     'role'      => $request->role,
        //     'username'  => $request->has('password') ? $request->username : null,
        //     'password'  => $request->has('password') ? $request->password : null,
        // ];

        // $truck = $this->truck->find($id);

        // if(is_null($truck)) {
        //     return redirect('backoffice')->withErrors('Not Found User');
        // }

        // $truck->update($params);
        // return redirect('backoffice');
        
        // return view('backoffice.main');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $truck = $this->truck->find($id);
        
        // if(is_null($truck)) {
        //     return redirect('backoffice')->withErrors('Not Found User');
        // }

        // $truck->delete();
        // return redirect('backoffice');        
    }
}
