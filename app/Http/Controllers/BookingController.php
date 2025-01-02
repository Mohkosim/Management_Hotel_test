<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Booking;
use App\Models\Unit;
use App\Models\Guest;
use App\Models\Inventory;
use App\Models\Booker;
use Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::with('booker', 'booker.guest', 'booking')->latest()->filter(request(['search']))->paginate(10);

        return view('reservations.bookings.index', [
            'title' => 'Reservations',
            'reservations' => $reservations
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create($step = 1, Request $request)
    {
        $data = array_merge(
            session('step1', []),
            session('step2', []),
        );
        $bookerId = $request->query('bookerId');
        $booker =  Booker::find($bookerId);

        $guests = Guest::all();
        $units = Unit::all();
        $inventories = Inventory::with('unitGroup')->get();

        return view('reservations.bookings.create', [
            'title' => 'Create Bookings',
            'guests' => $guests,
            'inventories' => $inventories,
            'units' => $units,
            'step' => $step,
            'data' => $data,
            'booker' => $booker
        ]);
    }

    public function postStep1(Request $request, $bookerId)
    {
        $request->validate([
            'arrival_date' => 'required',
            'departure_date' => 'required',
            'booking_date' => 'required',
            'inventory_id' => 'required|exists:inventories,id',
        ]);

        session(['step1' => $request->only('arrival_date', 'departure_date', 'inventory_id', 'booking_date')]);
        // dd(session());
        return redirect()->route('bookings.create', ['step' => 2, 'bookerId' => $bookerId]);
    }

    public function postStep2(Request $request, $bookerId)
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
        return redirect()->route('bookings.create', ['step' => 3, 'bookerId' => $bookerId]);
    }

    public function postStep3(Request $request, $bookerId)
    {
        $step1Data = session('step1', []);
        $step2Data = session('step2', []);

        // dd($step1Data, $step2Data, $step3Data);
        // Create Booker
        $booker = Booker::find($bookerId);
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


        session()->forget(['step1', 'step2']);
        // dd(session());

        return redirect()->route('bookings.show', ['id' => $booker->id])->with('success', 'Reservation has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Ambil booker dan semua tamu yang terkait
        $booker = Booker::with('guest')->findOrFail($id);

        // Ambil semua guest ID yang terkait dengan booker
        $guestIds = $booker->guest->pluck('id');

        // Ambil semua reservasi untuk guest yang terkait dengan booker
        $reservations = Reservation::with('guest', 'guest.booker', 'booking.payment')
            ->whereIn('guest_id', $guestIds) // Menggunakan whereIn untuk mengambil semua guest
            ->latest()
            ->filter(request(['search']))
            ->paginate(10);

        return view('reservations.bookings.show', [
            'title' => 'Reservation Detail',
            'reservations' => $reservations,
            'booker' => $booker
        ]);
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

        $reservation->booker->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'address' => $request->address,
            'postal_code' => $request->postal_code,
            'place_of_birth' => $request->place_of_birth,
        ]);

        return redirect()->route('bookings.show', ['id' => $reservation->id])->with('success', 'Booking information updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
