<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Inventory;
use App\Models\Unit;
use App\Models\UnitGroup;

class HouseKeepingController extends Controller
{

    public function index()
    {
        $inventories = Inventory::with('unit')->get();

        // Menghitung status unit
        // $dirtyUnits = Unit::where('status', 'dirty')->count();
        // $inspectUnits = Unit::where('status', 'clean_to_be_inspected')->count();
        // $cleanUnits = Unit::where('status', 'clean')->count();
        // $outOfServices = Unit::where('status', 'out_of_service')->count();
        // $outOfOrderUnits = Unit::where('status', 'out_of_order')->count();

        // Mengirim data ke tampilan
        return view('housekeeping.index', [
            'title' => 'Housekeeping',
            'inventories' => $inventories
        ]);

    }

    public function updateStatus(Request $request, $id)
    {
        $unit = Unit::findOrFail($id);

        $request->validate([
            'status' => 'required|in:clean,clean_to_be_inspected,dirty'
        ]);

        $unit->status = $request->input('status');
        $unit->save();

        return redirect()->route('housekeeping.index')->with('success', 'Status kamar berhasil diperbarui.');
    }

    public function getUnitData()
    {
        $units = Unit::all();
        return response()->json($units);
    }

    public function getUnitGroup()
    {
        $unitGroups = UnitGroup::all();
        return response()->json($unitGroups);
    }

    public function searchData(Request $request)
    {
        $keyword = $request->input('keyword');
        $results = Unit::with('unitGroup')
            ->where('room_number', 'like', "%$keyword%")
            ->orWhereHas('unitGroup', function ($query) use ($keyword) {
                $query->where('name', 'like', "%$keyword%");
            })
            ->get();

        return response()->json($results);
    }
}
