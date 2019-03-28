<?php

namespace App\Http\Controllers;

use App\DpContract;
use Illuminate\Http\Request;

class DpContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dp_contracts = DpContract::all();
        return response()->json($dp_contracts);

        // rwhite: something I'm messing with
        // return DpContract::all()->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DpContract  $dpContract
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, DpContract $dpContract)
    {
        if ($request->input('date')) {
            // show all music contract data for a partner on this date
            $response = [];
            $usages = $dpContract->usages()->get();
            foreach ($usages as $usage) {
                $musicContracts = $usage->musicContracts()
                    ->whereDate('start_date', '<=', $request->input('date'))
                    ->where(function($query) use ($request) {
                        $query->whereNull('end_date')
                              ->orWhere(function($query) use ($request) {
                                  $query->whereDate('end_date', '>=', $request->input('date'));
                              });
                    })
                    ->with('artist')
                    ->get()
                    ->toArray();
                $response = array_merge($response, $musicContracts);

                // $musicContracts = $usage->musicContracts()->get()->whereDate('start_date', '<=', date('Y-m-d', strtotime($request->input('date'))));
                // foreach ($musicContracts as $musicContract) {
                //     $response = array_merge($response, $musicContract->toArray());
                // }
            }
            return response()->json($response);
        } else {
            return response()->json($dpContract);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DpContract  $dpContract
     * @return \Illuminate\Http\Response
     */
    public function edit(DpContract $dpContract)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DpContract  $dpContract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DpContract $dpContract)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DpContract  $dpContract
     * @return \Illuminate\Http\Response
     */
    public function destroy(DpContract $dpContract)
    {
        //
    }
}
