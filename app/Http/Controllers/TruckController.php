<?php

namespace App\Http\Controllers;

use App\Truck;
use App\Fuel;
use App\Tire;
use App\Maintain;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

class TruckController extends Controller
{
    protected $truck;
    protected $fuel;
    protected $tire;
    protected $maintain;

    function __construct(Truck $truck, Fuel $fuel, Tire $tire, Maintain $maintain) {
        $this->truck = $truck;
        $this->fuel = $fuel;
        $this->tire = $tire;
        $this->maintain = $maintain;
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
        $validator = $this->validate($request, [
            'licensePlate' => 'unique:trucks,license_plate',
            'lastNumberCar' => 'numeric',
        ]);

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
			'row_of_wheel'	=> $request->rowOfWheel,
			'number_wheel_per_row'	=> json_encode($request->numberWheelPerRow),
        ];

        $this->truck->create($params);
        return redirect('backoffice');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json($this->truck->find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->json($this->truck->find($id));
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
        $validator = $this->validate($request, [
            'licensePlate' => [
                'numeric',
                Rule::unique('trucks', 'license_plate')->ignore($id)
            ],    
            'lastNumberCar' => 'numeric',
        ]);
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
			'row_of_wheel'	=> $request->rowOfWheel,
			'number_wheel_per_row'	=> json_encode($request->numberWheelPerRow),
        ];

        $truck = $this->truck->find($id);

        if(is_null($truck)) {
            return redirect('backoffice')->withErrors('ไม่พบข้อมูลรถบรรทุก');
        }

        $truck->update($params);
        return redirect('backoffice');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $truck = $this->truck->find($id);

        $fuel = $this->fuel->where('license_plate', $id)->count();
        $tire = $this->tire->where('license_plate', $id)->count();
        $maintain = $this->maintain->where('license_plate', $id)->count();
        
        if($fuel || $tire || $maintain) {
            return redirect('backoffice')->withErrors('ไม่สามารถลบพนักงานได้เนื่องจากมีการใช้งานอยู่');
        }
        
        if(is_null($truck)) {
            return redirect('backoffice')->withErrors('ไม่พบข้อมูลรถบรรทุก');
        }

        $truck->delete();
        return redirect('backoffice');        
    }

    public function getTruckWillExpire() {
        $trucks = $this->truck->all();
        $dataExpire = [];

        $count = 0;
        foreach ($trucks as $truck) {
            $annualTaxDate = Carbon::parse($truck->annual_tax_date)->addYear();
            $annualTaxDateSub30 = $annualTaxDate->copy()->subDays(30);
            if ($annualTaxDate->isPast()) {
                $dataExpire[$count]['expired'] = $truck;
            } 
            if ($annualTaxDateSub30->isPast()) {
                $dataExpire[$count]['willExpire'] = $truck;                
            }
            $count++;
        }
        return response()->json($dataExpire);
    }
}
