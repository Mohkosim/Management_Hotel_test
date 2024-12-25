<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\Guest;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalDataRevenue = Dashboard::Revenue();
        $totalDataNewCustomer = Dashboard::NewCustomer();
        $totalDataNewOrder = Dashboard::NewOrder();
        $totalDataOrder = Dashboard::OrderPermont();
        $totalDataCustomer = Dashboard::TotalDataCustomer();
        $dataBulan = Dashboard::DataBulan();


        return view('dashboard', [
            'title' => 'Dashboard',
            'dataBulan' => $dataBulan,
            'totalDataRevenue' => $totalDataRevenue,
            'totalDataNewCustomer' => $totalDataNewCustomer,
            'totalDataNewOrder' => $totalDataNewOrder,
            'totalDataCustomer' => $totalDataCustomer,
            'totalDataOrder' => $totalDataOrder
        ]);

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
