<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Report</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .logo {
            max-width: 150px;
        }
        .header, .footer {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 12px; /* Adjust the font size to make the table smaller */
        }
        th, td {
            border: 1px solid #000;
            padding: 4px; /* Reduce padding to make the cells smaller */
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('images/logo-jinggo-icon.jpg') }}" alt="Logo" class="logo">
        </div>
        <h2>Report: Reservations and Payments</h2>
        <table>
            <thead>
                <tr>
                    <th>Invoice Number</th>
                    <th>Guest</th>
                    <th>Rate Plan</th>
                    <th>Check-in</th>
                    <th>Check-out</th>
                    <th>Booking Date</th>
                    <th>Total Harga Room</th>
                    <th>Status</th>
                    <th>Amount</th>
                    <th>Returns</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->invoice_number }}</td>
                    <td>{{ $reservation->guest->name }}</td>
                    <td>{{ $reservation->rate_plan->inventory->unit->name }}</td>
                    <td>{{ $reservation->check_in }}</td>
                    <td>{{ $reservation->check_out }}</td>
                    <td>{{ $reservation->booking_date }}</td>
                    <td>{{ $reservation->total_harga_room }}</td>
                    @php
                        $payment = $reservation->payment;
                    @endphp
                    @if($payment)
                        <td>{{ $payment->status }}</td>
                        <td>{{ $payment->amount }}</td>
                        <td>{{ $payment->returns }}</td>
                    @else
                        <td colspan="3">No Payment Data</td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="footer">
            <p>Thank you for your business!</p>
        </div>
    </div>
</body>
</html>