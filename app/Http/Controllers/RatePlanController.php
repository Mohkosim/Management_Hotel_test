<?php

namespace App\Http\Controllers;

use App\Models\RatePlan;
use App\Models\UnitGroup;
use Illuminate\Http\Request;

class RatePlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('sales.rate-plans.index', ['title' => 'Rate plans', 'ratePlans' => RatePlan::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sales.rate-plans.create', ['title' => 'Create rate plan', 'unitGroups' => UnitGroup::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'unit_group_id' => 'required|exists:unit_groups,id',
            'price' => 'required|integer',
        ]);
        
        RatePlan::create([
            'unit_group_id' => $request->unit_group_id,
            'price' => $request->price,
        ]);

        return redirect('/sales/rate-plans')->with('success', 'New rate plans has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(RatePlan $ratePlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RatePlan $ratePlan)
    {
        return view('sales.rate-plans.edit', ['title' => $ratePlan->unitGroup->type, 'ratePlan' => $ratePlan, 'unitGroups' => UnitGroup::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RatePlan $ratePlan)
    {
        $request->validate([
            'price' => 'required|integer',
        ]);

        $ratePlan->update([
            'price' => $request->price,
        ]);

        return redirect('/sales/rate-plans')->with('success', 'Rate plan has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RatePlan $ratePlan)
    {
        $ratePlan->delete();
        return redirect('/sales/rate-plans')->with('success', 'Rate plan has been deleted!');
    }
}
