<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Payment;
use App\Models\RatePlan;
use PDF;

class Invoice_FoliosController extends Controller
{
    public function generatePDFReport()
    {
        $reservations = Reservation::with(['guest', 'rate_plan', 'payment'])->get();

        $pdf = PDF::loadView('finance.folios.report', compact('reservations'));
        return $pdf->download('report.pdf');
    }



    public function indexInvoice()
    {
        $reservations = Reservation::with('booker.guest', 'bookings')->latest()->filter(request(['search']))->paginate(10);
        return view('finance.invoice.index', [
            'title' => 'Invoice',
            'reservations' => $reservations
        ]);
    }

    public function indexFolios()
    {
        $reservations = Reservation::with(['guest', 'rate_plan.inventory.unitGroup', 'payment'])->get();
        return view('finance.folios.index', ['title' => 'Folios'], compact('reservations'));
    }

    public function generatePdfinvoice($id)
    {
        $reservation = Reservation::find($id);
        $ratePlan = $reservation->rate_plan;

        if (!$reservation) {
            abort(404);
        }

        $pdf = PDF::loadView('finance.invoice.pdf', compact('reservation', 'ratePlan'));
        return $pdf->download('invoice_Managemen_Hotel_Poliwangi.pdf');
    }

    public function generatePdffolios($id)
    {
        $reservation = Reservation::find($id);
        $ratePlan = $reservation->rate_plan;

        if (!$reservation) {
            abort(404);
        }

        $pdf = PDF::loadView('finance.folios.pdf', compact('reservation', 'ratePlan'));
        return $pdf->download('folios_Managemen_Hotel_Poliwangi.pdf');
    }
}
