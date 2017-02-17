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
        if (($request->startDate == 'all' && $request->endDate == 'all') ||
            (!$request->has('startDate') && !$request->has('endDate'))
        ) {
            $maintains = $this->maintain->all();
        }elseif($request->startDate != 'all' && $request->endDate != 'all') {
            $maintains = $this->maintain
                        ->where('maintain_date', '>=', $request->startDate)
                        ->where('maintain_date', '<=', $request->endDate)
                        ->get();
        } elseif ($request->startDate != 'all') {
            $maintains = $this->maintain
                        ->where('maintain_date', '>=', $request->startDate)
                        ->get();
        } elseif ($request->endDate != 'all') {
            $maintains = $this->maintain
                        ->where('maintain_date', '<=', $request->endDate)
                        ->get();
        }
        
        if ($maintains->isEmpty()) {
            $dataMerge = [];
        } else {
            foreach ($maintains as $maintain) {
                $dataMerge[] = [
                    'user' => $maintain->user,
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
