<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\UnitGroup;
use Illuminate\Http\Request;

class UnitGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('rooms.unit-groups.index', ['title' => 'Unit Groups', 'unitGroups' => UnitGroup::latest()->filter(request(['search']))->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rooms.unit-groups.create', ['title' => 'Create Unit Group']);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'type' => 'required'
        ]);

        UnitGroup::create($validatedData);

        return redirect('/room/unit-groups')->with('success', 'New unit group has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $unitGroup = UnitGroup::findOrFail($id);
        return view('rooms.unit-groups.show', ['title' => $unitGroup->type, 'unitGroup' => $unitGroup]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $unitGroup = UnitGroup::findOrFail($id);
        return view('rooms.unit-groups.edit', ['title' => $unitGroup->type, 'unitGroup' => $unitGroup]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required'
        ]);

        $unitGroup = UnitGroup::findOrFail($id);
        $unitGroup->update($request->only(['type']));

        return redirect('/room/unit-groups')->with('success', 'Unit group has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UnitGroup $unitGroup)
    {
        UnitGroup::destroy($unitGroup->id);

        return redirect('/room/unit-groups')->with('success', 'Unit group has been deleted!');
    }
}
