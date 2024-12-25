<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Reservation;
use App\Models\Booking;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        // Validasi input
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'amount' => 'required|numeric',
        ]);

        $bookingId = $request->input('booking_id');
        $amountPaid = $request->input('amount');


        // Simpan pembayaran
        $payment = new Payment();
        $payment->booking_id = $bookingId;
        $payment->amount = $amountPaid;
        $payment->save();

        // Redirect ke halaman reservasi dengan pesan sukses
        return redirect()->route('reservations.show', $bookingId)->with('success', 'Payment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
