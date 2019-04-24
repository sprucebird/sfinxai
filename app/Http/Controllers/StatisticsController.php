<?php

namespace App\Http\Controllers;

use App\Statistics;
use App\payments;
use App\paymentStatistics;
use App\fees;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $balance = 0;
        $payments = payments::all();
        $fees = fees::all();
        $balance = calculateBalance($payments, $fees);
        return view('stats.index', compact('balance'));
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
     * Return balances from different time periods
     *
     * @return \Illuminate\Http\Response
     */
    public function balanceHistory($range)
    {
        if($range == "studio")
        {
            $JSONedBalances = [];
            $months = [];
            $balances = paymentStatistics::where('range', 'ALL')->get();
            foreach ($balances as $balance) {
                array_push($months, $balance->month);
                array_push($JSONedBalances, $balance->balance);
            }
            return response()->json(['months' => $months, 'balances' => $JSONedBalances]);
        }
        //
    }

    public function paymentsHistory($range)
    {
            $JSONed = [];
            $months = [];
            $payments;
            for ($i=1; $i < 13; $i++) {
                $payments = paymentStatistics::where('range', 'ALL')->where('month', $i)->first();
                if(!empty($payments)){
                    array_push($months, $i);
                    array_push($JSONed, $payments->payments);
                }
            }

            // foreach ($payments as $balance)
            // {
            //     array_push($months, $balance->month);
            //     array_push($JSONed, $balance->payments);
            // }
            return response()->json(['months' => $months, 'payments' => $JSONed]);
    }

    public function economyHistory($range)
    {
            $JSONed = [];
            $months = [];
            $Fees = fees::all();
            $Payments = payments::all();
            $FeeSum = 0;
            $PaymentsSum = 0;
            foreach ($Payments as $payment) {
                $PaymentsSum+= $payment->price;
            }
            foreach ($Fees as $fee) {
                $FeeSum+=$fee->price;
            }
            for ($i=1; $i < 13; $i++) {
                array_push($months, $i);
                array_push($JSONed, $PaymentsSum / $FeeSum);
            }
            return response()->json(['months' => $months, 'k' => $JSONed]);
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
     * @param  \App\Statistics  $statistics
     * @return \Illuminate\Http\Response
     */
    public function show(Statistics $statistics)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Statistics  $statistics
     * @return \Illuminate\Http\Response
     */
    public function edit(Statistics $statistics)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Statistics  $statistics
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Statistics $statistics)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Statistics  $statistics
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statistics $statistics)
    {
        //
    }
}
