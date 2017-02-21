<?php

namespace App\Http\Controllers;

use App\Tire;
use App\User;
use App\Truck;

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
    public function index(Request $request)
    {
        $query = $this->tire;
        if ( $request->has('startDate') && $request->startDate != 'all' ) {
            $query = $query->where('tire_date', '>=', $request->startDate);
        }
        if ( $request->has('endDate') && $request->endDate != 'all' ) {
            $query = $query->where('tire_date', '<=', $request->endDate);            
        }

        $tires = $query->get();
        $dataMerge = [];

        if( $request->has('truckDriver') && $request->truckDriver != 'all' ) {
            foreach ($tires as $tire) {
                if ($request->truckDriver == $tire->user->id) {
                    $dataMerge[] = [
                        'user' => $tire->user,
                        'tire' => $tire,
                        'truck' => $tire->truck,
                    ];
                }
            }
        } else {
            foreach ($tires as $tire) {
                $dataMerge[] = [
                    'user' => $tire->user,
                    'tire' => $tire,
                    'truck' => $tire->truck,
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

        $rules = [
            'truckDriver' => 'exists:users,id',
            'licensePlate' => 'exists:trucks,id',
        ];
        $messages = [
            'exists' => 'ไม่พบ :attribute นี้',
        ];
        $validator = $this->validate($request, $rules, $messages);

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
            'total_tire_price'=> $request->totalTirePrice,
            'total_amout_cost'=> $request->totalAmoutCost,
            'note'          => $request->note,

        ];
        $this->tire->create($params);
        
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
        $rules = [
            'truckDriver' => 'exists:users,id',
            'licensePlate' => 'exists:trucks,id',
        ];
        $messages = [
            'exists' => 'ไม่พบ :attribute นี้',
        ];
        $validator = $this->validate($request, $rules, $messages);
        
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
            'total_tire_price'=> $request->totalTirePrice,
            'total_amout_cost'=> $request->totalAmoutCost,
            'note'          => $request->note,

        ];

        $tire = $this->tire->find($id);
        if(is_null($tire)) {
            return redirect('/')->withErrors('ไม่พบข้อมูลการเปลี่ยนยาง');
        }

        $tire->update($params);
        
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $tire = $this->tire->find($id);
        
        if(is_null($tire)) {
            return redirect('/')->withErrors('ไม่พบข้อมูลการเปลี่ยนยาง');
        }

        $tire->delete();
        return redirect('/');
    }
}
