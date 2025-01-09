<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Inventory;
use App\Models\Unit;
use App\Models\UnitGroup;
use App\Models\HouseKeeping;

class HouseKeepingController extends Controller
{

    public function index()
    {
        $housekeepings = HouseKeeping::paginate(3);
        $inventories = Inventory::with('unit', 'unitgroup')->get();

        // Menghitung status unit
        $dirtyUnits = HouseKeeping::where('current_condition', 'dirty')->count();
        $inspectUnits = HouseKeeping::where('current_condition', 'Inspect')->count();
        $cleanUnits = HouseKeeping::where('current_condition', 'clean')->count();
        // $outOfServices = Unit::where('status', 'out_of_service')->count();
        // $outOfOrderUnits = Unit::where('status', 'out_of_order')->count();

        // Mengirim data ke tampilan
        return view('housekeeping.index', [
            'title' => 'Housekeeping',
            'inventories' => $inventories,
            'housekeepings' => $housekeepings,
            'dirtyUnits' => $dirtyUnits,
            'inspectUnits' => $inspectUnits,
            'cleanUnits' => $cleanUnits
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        $housekeeping = HouseKeeping::findOrFail($id);

        $request->validate([
            'status' => 'required|in:clean,Inspect,dirty'
        ]);

        // Update status berdasarkan input dari form
        $housekeeping->current_condition = $request->input('status');
        $housekeeping->save();

        return redirect()->route('housekeeping.index')->with('success', 'Status kamar berhasil diperbarui.');
    }

    public function searchData(Request $request)
    {
        $keyword = $request->input('keyword');
        $results = HouseKeeping::with('unitgroup')
            ->where('type', 'like', "%$keyword%")
            ->orWhereHas('unit', function ($query) use ($keyword) {
                $query->where('name', 'like', "%$keyword%");
            })
            ->get();

        return response()->json($results);
    }
}
