<?php

namespace App\Http\Controllers;

use App\Maintain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class MaintainController extends Controller
{
    protected $maintain;
    function __construct(Maintain $maintain) {
        $this->maintain = $maintain;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $this->maintain;
        if ( $request->has('startDate') && $request->startDate != 'all' ) {
            $query = $query->where('maintain_date', '>=', $request->startDate);
        }
        if ( $request->has('endDate') && $request->endDate != 'all' ) {
            $query = $query->where('maintain_date', '<=', $request->endDate);            
        }

        $maintains = $query->get();
        $dataMerge = [];

        if( $request->has('truckDriver') && $request->truckDriver != 'all' ) {
            foreach ($maintains as $maintain) {
                if ($request->truckDriver == $maintain->user->id) {
                    $dataMerge[] = [
                        'user' => $maintain->user,
                        'truck' => $maintain->truck,
                        'maintain' => $maintain,
                    ];
                }
            }
        } else {
            foreach ($maintains as $maintain) {
                $dataMerge[] = [
                    'user' => $maintain->user,
                    'truck' => $maintain->truck,
                    'maintain' => $maintain,
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
            'maintain_date'  => date('Y-m-d', strtotime($request->maintainDate)),
            'maintain_employee'  => $request->maintainEmployee,
            'maintain_lists' => json_encode($request->maintainLists),
            'wage_per_list'   => json_encode($request->wagePerList),
            'spare_per_list'  => json_encode($request->sparePerList),
            'total_wage'     => $request->totalWage,
            'total_spare'    => $request->totalSpare,
            'amount_cost'    => $request->amountCost,
            'note'          => $request->note,
        ];
        // dd($params);
        $this->maintain->create($params);
        
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
