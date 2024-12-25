<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Payment;
use App\Models\Booking;
use PDF;

class Invoice_FoliosController extends Controller
{
    public function generatePDFReport()
    {
        $reservations = Reservation::with('booker.guest', 'booking', 'booking.payment')->latest()->filter(request(['search']))->paginate(10);

        $pdf = PDF::loadView('finance.folios.report', compact('reservations'));
        return $pdf->download('report.pdf');
    }



    public function indexInvoice()
    {
        $reservations = Reservation::with('booker.guest', 'booking')->latest()->filter(request(['search']))->paginate(10);
        return view('finance.invoice.index', [
            'title' => 'Invoice',
            'reservations' => $reservations
        ]);
    }

    public function indexFolios()
    {
        $reservations = Reservation::with('booker.guest', 'booking', 'booking.payment')->latest()->filter(request(['search']))->paginate(10);
        return view('finance.folios.index', ['title' => 'Folios'], compact('reservations'));
    }

    public function generatePdfinvoice($id)
    {
        $reservation = Reservation::with('booking')->find($id);

        if (!$reservation) {
            abort(404);
        }

        $invoiceNumber = $this->generateInvoiceNumber($reservation->id);

        $pdf = PDF::loadView('finance.invoice.pdf', compact('reservation', 'invoiceNumber'));
        return $pdf->download('invoice_Managemen_Hotel_Poliwangi.pdf');
    }



    public function generatePdffolios($id)
    {
        $reservation = Reservation::with('booking')->find($id);

        if (!$reservation) {
            abort(404);
        }


        $invoiceNumber = $this->generateInvoiceNumber($reservation->id);

        $pdf = PDF::loadView('finance.folios.pdf', compact('reservation', 'invoiceNumber'));
        return $pdf->download('folios_Managemen_Hotel_Poliwangi.pdf');
    }


    private function generateInvoiceNumber($reservationId)
    {
        $date = date('Ymd');
        return 'INV-' . $date . '-' . str_pad($reservationId, 3, '0', STR_PAD_LEFT);
    }
}
