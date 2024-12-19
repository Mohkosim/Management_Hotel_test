<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Reservation;
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
            'amount' => 'required|numeric',
        ]);

        $reservationId = $request->input('reservation_id');
        $amountPaid = (float) $request->input('amount');

        // Hitung total harga reservasi
        $reservation = Reservation::findOrFail($reservationId);
        $totalAmountDue = $reservation->total_harga_room;
        $totalAmountPaid = $reservation->payments()->sum('amount');

        // Hitung pengembalian jika ada
        $returns = 0;
        if ($amountPaid > $totalAmountDue - $totalAmountPaid) {
            $returns = $amountPaid - ($totalAmountDue - $totalAmountPaid);
            $amountPaid = $totalAmountDue - $totalAmountPaid;
        }

        // Simpan pembayaran
        $payment = new Payment();
        $payment->reservation_id = $reservationId;
        $payment->amount = $amountPaid;
        $payment->returns = $returns;
        $payment->save();

        // Redirect ke halaman reservasi dengan pesan sukses
        return redirect()->route('reservations.show', $reservationId)->with('success', 'Payment created successfully.');

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
