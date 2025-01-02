<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            justify-content: space-between;
            margin: 0;
        }

        .column {
            text-align: center;
        }

        .column p {
            margin: 0;
        }

        .left {
            float: left;
            text-align: left;
        }

        .right {
            float: right;
            text-align: right;
        }

        .logo {
            width: 200px;
            height: auto;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f3f4f6;
        }
    </style>
</head>
<body class="bg-gray-200">-
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-8">
            <div>
                <img src="{{ asset('images/logo-jinggo-h.png') }}" alt="Logo" class="logo">
            </div>
            <div class="text-right">
                <h1 class="text-2xl font-bold">INVOICE</h1>
                <p>Invoice No: <span class="font-normal">{{ $invoiceNumber }}</span></p>
            </div>
        </div>

        <div class="mb-8">
            <p class="font-bold">Ditujuakan Kepada: <span class="font-normal">{{ $reservation->guest->name }}</span></p>
            <p class="font-bold">Booking Date: <span class="font-normal">@foreach ($reservation->booking as $booking)
                    {{ $booking->booking_date }}<br>
                    @endforeach</span></p>
            <p class="font-bold">Alamat: <span class="font-normal">{{ $reservation->guest->address }}</span></p>
        </div>
        <p>Rincian Biaya :</p>
        <table class="mb-8">
            <thead>
                <tr>
                    <th>Number of Rooms</th>
                    <th>Tipe Rooms</th>
                    <th>Check_In</th>
                    <th>Check_Out</th>
                    <th>Booking Unit</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $reservation->inventory->unit->name }}</td>
                    <td>{{ $reservation->inventory->unitGroup->type }}</td>
                    <td>{{ $reservation->arrival_date }}</td>
                    <td>{{ $reservation->departure_date }}</td>
                    <td>Rp. {{ $reservation->inventory->ratePlan->price }}</td>
                </tr>
                <tr class="font-bold">
                    <td colspan="4">Total Price</td>
                    <td>Rp. {{ $booking->total_price }}</td>
                </tr>
            </tbody>
        </table>

        <div>
            <p class="font-bold">Terimakasih</p>
            <p>{{ $reservation->guest->name }}</p>
            <p>{{ $reservation->guest->phone }}</p>
            <p>{{ $reservation->guest->address }}</p>
            <p>{{ $reservation->guest->email }}</p>
            <br>
        </div>

        <div class="container">
            <div class="column left">
                <p>Hormat Kami,</p>
                <br><br><br><br>
                <p><strong><u>Muhamad Ari Perdana</u></strong></p>
                <p><em>Sales & Marketing Manager</em></p>
            </div>
            <div class="column right">
                <p>Menyetujui</p>
                <br><br><br><br>
                <p><strong><u>{{ $reservation->guest->name }}</u></strong></p>
                <p><em>Customer</em></p>
            </div>
        </div>
    </div>
</body>
</html>
