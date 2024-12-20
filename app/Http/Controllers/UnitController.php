<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\UnitGroup;
use App\Models\RatePlan;
use App\Models\Inventory;
use App\Models\HouseKeeping;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('rooms.units.index', ['title' => 'Units', 'inventories' => Inventory::latest()->filter(request(['search']))->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rooms.units.create', ['title' => 'Create Unit', 'unitGroups' => UnitGroup::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'max_person' => 'required|integer',
            'unit_group_id' => 'required|exists:unit_groups,id',
            'rate_plan_id' => 'required|exists:rate_plans,id',
        ]);

        $unit = Unit::create($request->only(['name', 'description', 'max_person']));

        HouseKeeping::create([
            'unit_id' => $unit->id,
            'current_condition' => 'Clean',
            'current_status' => 'Free',
        ]);

        Inventory::create([
            'unit_id' => $unit->id,
            'unit_group_id' => $request->unit_group_id,
            'rate_plan_id' => $request->rate_plan_id,
        ]);

        return redirect('/room/units')->with('success', 'New Unit has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $unit = Unit::findOrFail($id);
        $inventory = Inventory::where('unit_id', $id)->firstOrFail();
        return view('rooms.units.show', ['title' => $unit->name, 'inventory' => $inventory]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $unit = Unit::findOrFail($id);
        $inventory = Inventory::where('unit_id', $id)->firstOrFail();
        return view('rooms.units.edit', ['title' => $unit->name, 'inventory' => $inventory, 'unitGroups' => UnitGroup::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'max_person' => 'required|integer',
            'unit_group_id' => 'required|exists:unit_groups,id',
            'rate_plan_id' => 'required|exists:rate_plans,id',
        ]);

        $unit = Unit::findOrFail($id);
        $unit->update($request->only(['name', 'description', 'max_person']));

        $inventory = Inventory::where('unit_id', $id)->first();
        if ($inventory) {
            $inventory->update([
                'unit_group_id' => $request->unit_group_id,
                'rate_plan_id' => $request->rate_plan_id,
            ]);
        } else {
            Inventory::create([
                'unit_id' => $id,
                'unit_group_id' => $request->unit_group_id,
                'rate_plan_id' => $request->rate_plan_id,
            ]);
        }

        return redirect('/room/units')->with('success', 'Unit has been updated!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $unit = Unit::findOrFail($id);
        $unit->delete();

        return redirect('/room/units')->with('success', 'Unit has been deleted!');
    }

    public function getRatePlansByRoomType($unitGroupId)
    {
        $ratePlans = RatePlan::where('unit_group_id', $unitGroupId)->get();
        return response()->json($ratePlans);
    }
}
