<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Inventory;
use App\Models\Reservation;
use App\Models\Unit;
use App\Models\UnitGroup;
use App\Models\Booker;
use App\Models\Booking;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::with('booker.guest', 'booking')->latest()->filter(request(['search']))->paginate(10);

        return view('reservations.index', [
            'title' => 'Reservations',
            'reservations' => $reservations
        ]);
        // return view('reservations.index', ['title' => 'Reservations', 'reservations' => Reservation::latest()->filter(request(['search']))->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($step = 1)
    {
        $data = array_merge(
            session('step1', []),
            session('step2', []),
            session('step3', []),
        );

        $guests = Guest::all();
        $units = Unit::all();
        $inventories = Inventory::with('unitGroup')->get();

        return view('reservations.create', [
            'title' => 'Create Reservations',
            'guests' => $guests,
            'inventories' => $inventories,
            'units' => $units,
            'step' => $step,
            'data' => $data
        ]);
    }

    public function postStep1(Request $request)
    {
        $request->validate([
            'arrival_date' => 'required',
            'departure_date' => 'required',
            'booking_date' => 'required',
            'inventory_id' => 'required|exists:inventories,id',
        ]);

        session(['step1' => $request->only('arrival_date', 'departure_date', 'inventory_id', 'booking_date')]);
        // dd(session());
        return redirect()->route('reservations.create', ['step' => 2]);
    }

    public function postStep2(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'postal_code' => 'required',
            'place_of_birth' => 'required',
        ]);


        session(['step2' => $request->only('booker_id', 'name', 'email', 'phone', 'date_of_birth', 'gender', 'address', 'postal_code', 'place_of_birth')]);
        //dd(session());
        return redirect()->route('reservations.create', ['step' => 3]);
    }

    public function postStep3(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'postal_code' => 'required',
            'place_of_birth' => 'required',
        ]);

        session(['step3' => $request->only('name', 'email', 'phone', 'date_of_birth', 'gender', 'address', 'postal_code', 'place_of_birth')]);
        // dd(session());
        return redirect()->route('reservations.create', ['step' => 4]);
    }


    public function postStep4(Request $request)
    {
        $step1Data = session('step1', []);
        $step2Data = session('step2', []);
        $step3Data = session('step3', []);

        // dd($step1Data, $step2Data, $step3Data);

        // Create Booker
        $booker = Booker::create([
            'name' => $step3Data['name'],
            'email' => $step3Data['email'],
            'phone' => $step3Data['phone'],
            'date_of_birth' => $step3Data['date_of_birth'],
            'gender' => $step3Data['gender'],
            'address' => $step3Data['address'],
            'postal_code' => $step3Data['postal_code'],
            'place_of_birth' => $step3Data['place_of_birth'],
        ]);

        // Generate random_id after the booker has been created
        $randomId = Booker::generateRandomId($booker->id);

        // Update the booker with the random_id
        $booker->update(['random_id' => $randomId]);

        // Create Guest
        $guest = Guest::create([
            'booker_id' => $booker->id,
            'name' => $step2Data['name'],
            'email' => $step2Data['email'],
            'phone' => $step2Data['phone'],
            'date_of_birth' => $step2Data['date_of_birth'],
            'gender' => $step2Data['gender'],
            'address' => $step2Data['address'],
            'postal_code' => $step2Data['postal_code'],
            'place_of_birth' => $step2Data['place_of_birth'],
        ]);

        $inventory = Inventory::find($step1Data['inventory_id']);
        $roomRate = $inventory->ratePlan->price;

        // Hitung jumlah hari antara arrival_date dan departure_date
        $arrivalDate = Carbon::parse($step1Data['arrival_date']);
        $departureDate = Carbon::parse($step1Data['departure_date']);
        $numberOfNights = $arrivalDate->diffInDays($departureDate) + 1;

        $totalPrice = $numberOfNights * $roomRate;

        // Create Reservation
        $reservation = Reservation::create([
            'guest_id' => $guest->id,
            'inventory_id' => $step1Data['inventory_id'],
            'arrival_date' => $step1Data['arrival_date'],
            'departure_date' => $step1Data['departure_date'],
        ]);

        $randomId = Reservation::generateRandomId($reservation->id);

        $reservation->update(['random_id' => $randomId]);

        // Create Booking
        Booking::create([
            'reservation_id' => $reservation->id,
            'booking_date' => $step1Data['booking_date'],
            'total_price' => $totalPrice,
        ]);


        session()->forget(['step1', 'step2', 'step3']);
        // dd(session());

        return redirect()->route('bookings.show', ['id' => $booker->id])->with('success', 'Reservation has been created successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'arrival_date' => 'required',
    //         'departure_date' => 'required',
    //         'booking_date' => 'required',
    //         'inventory_id' => 'required|exists:inventories,id',
    //     ]);



    //     $reservation = Reservation::create($validatedData);
    //     // echo $reservation->id;
    //     return redirect('/guests/create')->with('success', 'New Reservation has been added!');
    // }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $reservation = Reservation::findOrFail($id);
        $booking = Booking::findOrFail($id);

        return view('reservations.show', [
            'title' => $reservation->guest->name,
            'reservation' => $reservation,
            'booking' => $booking
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, $edit = 1)
    {
        $data = array_merge(
            session('update1', []),
            session('update2', []),
            session('update3', []),
        );

        $guests = Guest::all();
        $unitGroups = UnitGroup::all();
        $inventories = Inventory::with('unitGroup')->get();
        $reservation = Reservation::with('booker.guest')->findOrFail($id);

        return view('reservations.edit', [
            'title' => 'Edit Reservations',
            'guests' => $guests,
            'inventories' => $inventories,
            'unitGroups' => $unitGroups,
            'edit' => $edit,
            'data' => $data,
            'reservation' => $reservation
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update1(Request $request, $id)
    {
        $request->validate([
            'arrival_date' => 'required|date',
            'departure_date' => 'required|date|after:arrival_date',
            'booking_date' => 'required|date',
            'inventory_id' => 'required|exists:inventories,id',
        ]);

        // Temukan reservasi dengan ID
        $reservation = Reservation::findOrFail($id);

        // Memperbarui data reservasi
        $reservation->update([
            'arrival_date' => $request->arrival_date,
            'departure_date' => $request->departure_date,
            'inventory_id' => $request->inventory_id,
        ]);

        $arrivalDate = Carbon::parse($request->arrival_date);
        $departureDate = Carbon::parse($request->departure_date);
        $numberOfNights = $arrivalDate->diffInDays($departureDate);


        $inventory = Inventory::find($request->inventory_id);
        $roomRate = $inventory->ratePlan->price;

        $totalPrice = $numberOfNights * $roomRate;

        $booking = Booking::where('reservation_id', $reservation->id)->first();

        // Update booking data
        if ($booking) {
            $booking->update([
                'booking_date' => $request->booking_date,
                'total_price' => $totalPrice,
            ]);
        }

        return redirect()->route('reservations.edit', ['id' => $reservation->id, 'edit' => 2]);
    }

    public function update2(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'date_of_birth' => 'required|date',
            'gender' => 'required',
            'address' => 'required',
            'postal_code' => 'required',
            'place_of_birth' => 'required',
        ]);

        // Temukan reservasi berdasarkan ID
        $reservation = Reservation::findOrFail($id);

        // Perbarui data tamu
        $guest = $reservation->booker->guest;
        $guest->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'address' => $request->address,
            'postal_code' => $request->postal_code,
            'place_of_birth' => $request->place_of_birth,
        ]);

        return redirect()->route('reservations.edit', ['id' => $reservation->id, 'edit' => 3]);
    }

    public function update3(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'date_of_birth' => 'required|date',
            'gender' => 'required',
            'address' => 'required',
            'postal_code' => 'required',
            'place_of_birth' => 'required',
        ]);

        $reservation = Reservation::findOrFail($id);
        $booker = $reservation->booker;

        // Perbarui data booker
        $booker->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'address' => $request->address,
            'postal_code' => $request->postal_code,
            'place_of_birth' => $request->place_of_birth,
        ]);


        return redirect()->route('reservations.index')->with('success', 'Booking information updated successfully.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Temukan data reservasi berdasarkan ID
        $reservation = Reservation::find($id);

        // Periksa jika reservasi ditemukan
        if ($reservation) {
            // Hapus data reservasi (soft delete)
            $reservation->delete();

            // Redirect atau berikan respons sesuai kebutuhan aplikasi Anda
            return redirect()->back()->with('success', 'Reservation deleted successfully');
        } else {
            // Redirect atau berikan respons jika reservasi tidak ditemukan
            return redirect()->back()->with('error', 'Reservation not found');
        }
    }

    public function restoreAll()
    {
        // Kembalikan semua data reservasi yang di-soft delete
        $restoredCount = Reservation::onlyTrashed()->restore();

        // Redirect atau berikan respons sesuai kebutuhan aplikasi Anda
        return redirect()->back()->with('success', "{$restoredCount} reservations restored successfully");
    }
}
