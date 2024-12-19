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
            margin: 0%;
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

    </style>
</head>
<body class="bg-gray-200">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-8">
            <div>
                <img src="{{ asset('images/logo-jinggo-h.png') }}" alt="Logo" class="logo">
            </div>
            <div class="text-right">
                <h1 class="text-2xl font-bold">FOLIOS</h1>
                <p>Folios No: {{ $reservation->invoice_number }}</p>
            </div>
        </div>

        <div class="mb-8">
            <p class="font-bold">Ditujuakan Kepada: <span class="font-normal">{{ $reservation->guest->name }}</span></p>
            <p class="font-bold">Booking Date: <span class="font-normal">{{ $reservation->booking_date }}</span></p>
            <p class="font-bold">Alamat: <span class="font-normal">{{ $reservation->guest->address }}</span></p>
        </div>
        <p>Rincian Biaya :</p>
        <table class="w-full mb-8">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-2 py-2">Number of Rooms</th>
                    <th class="border px-2 py-2">Tipe Rooms</th>
                    <th class="border px-2 py-2">Check_In</th>
                    <th class="border px-2 py-2">Check_Out</th>
                    <th class="border px-2 py-2">Booking Unit</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border px-2 py-2">{{ $reservation->rate_plan->inventory->unit->name }}</td>
                    <td class="border px-2 py-2">{{ $reservation->rate_plan->inventory->unitGroup->type }}</td>
                    <td class="border px-2 py-2">{{ $reservation->check_in }}</td>
                    <td class="border px-2 py-2">{{ $reservation->check_out }}</td>
                    <td class="border px-2 py-2">Rp. {{ $reservation->rate_plan->price }}</td>
                </tr>
                <tr class="bg-gray-100 font-bold">
                    <td class="border px-2 py-2" colspan="4">Total Price</td>
                    <td class="border px-2 py-2">Rp. {{ $reservation->total_harga_room }}</td>
                </tr>
            </tbody>
        </table>

        <div class="text-right">
            <p class="font-bold">Status Pay: <span class="font-normal">@foreach ($reservation->payments as $payment)
                    <span>{{ $payment->status }}</span><br>
                    @endforeach</span></p>
            <p class="font-bold">Amount: <span class="font-normal">@foreach ($reservation->payments as $payment)
                    Rp. {{ $payment->amount }} <br>
                    @if ($payment->returns > 0)
                    <p class="font-bold">Returns: <span class="font-normal">
                        <span>Rp. {{ $payment->returns }}</span><br>
                        </span></p>
                    @endif
                    <br>
                    @endforeach</span></p>
        </div>

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
