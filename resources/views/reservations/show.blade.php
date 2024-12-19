<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    {{-- Breadcrumbs --}}
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse px-4 lg:px-12">
            <li class="inline-flex items-center">
                <a href="/reservations" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    Reservations
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="/reservations" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">List</a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="/reservations/{{ $reservation->id }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">View</a>
                </div>
            </li>
        </ol>
    </nav>

    {{-- Title --}}
    <h3 class="text-3xl font-bold dark:text-white px-4 lg:px-12">Detail Reservation</h3>

    <!-- Modal -->
    {{-- <div id="paymentModal" class="fixed inset-0 z-10 overflow-y-auto bg-transparent bg-opacity-75 flex items-center justify-center">
        <!-- Background overlay -->
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <!-- Modal content -->
        <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <!-- Modal header -->
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white" id="modal-title">
                            Payment
                        </h3>
                        <div class="mt-2">
                            <!-- Payment form or information -->
                            <p>Insert payment form or payment details here.</p>
                        </div>
                        <form action="/reservation" method="POST">
                            @csrf
                            <div class="sm:col-span-2 mt-4">
                                <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
    <label for="amount" class="block text-sm font-medium text-gray-700">Amount</label>
    <input type="text" name="amount" id="amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter amount" required>
    </div>
    <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
        <button type="submit" onclick="confirmPayment()" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-amber-500 text-base font-medium text-white hover:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 sm:ml-3 sm:w-auto sm:text-sm">
            Confirm Payment
        </button>
        <button type="button" onclick="closeModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 dark:border-gray-600 shadow-sm px-4 py-2 bg-white dark:bg-gray-700 text-base font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:mt-0 sm:w-auto sm:text-sm">
            Cancel
        </button>
    </div>
    </form>
    </div>
    </div>
    </div>
    </div>
    </div> --}}

    {{-- Table --}}
    <section class="bg-white dark:bg-gray-900 py-8 px-4 ml-0 mr-auto max-w-2xl lg:py-8">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="md:flex-row space-y-3 md:space-y-0 p-4">
                    <div class="mb-6" id="reservation-{{ $reservation->id }}" style="display: flex; flex-direction: column;">
                        <div style="display: flex;">
                            <p style="width: 150px;"><strong>Name<p>:</p></strong></p>
                            <p style="margin-left: 5px;">{{ $reservation->booker->guest->name }}</p>
                        </div>
                        <div style="display: flex;">
                            <p style="width: 150px;"><strong>Booker<p>:</p></strong></p>
                            <p style="margin-left: 5px;">{{ $reservation->booker->name }}</p>
                        </div>
                        <div style="display: flex;">
                            <p style="width: 150px;"><strong>Arrival date<p>:</p></strong></p>
                            <p style="margin-left: 5px;">{{ $reservation->arrival_date }}</p>
                        </div>
                        <div style="display: flex;">
                            <p style="width: 150px;"><strong>Departure date<p>:</p></strong></p>
                            <p style="margin-left: 5px;">{{ $reservation->departure_date }}</p>
                        </div>
                        <div style="display: flex;">
                            <p style="width: 150px;"><strong>Room number<p>:</p></strong></p>
                            <p style="margin-left: 5px;">{{ $reservation->inventory->unit->name }}</p>
                        </div>
                        <div style="display: flex;">
                            <p style="width: 150px;"><strong>Room type<p>:</p></strong></p>
                            <p style="margin-left: 5px;">{{ $reservation->inventory->unitGroup->type }}</p>
                        </div>
                        <div style="display: flex;">
                            <p style="width: 150px;"><strong>Booking date<p>:</p></strong></p>
                            <p style="margin-left: 5px;">
                                @foreach($reservation->bookings as $booking)
                                {{ $booking->booking_date }}<br>
                                @endforeach</td>
                            </p>
                        </div>
                        <div style="display: flex;">
                            <p style="width: 150px;"><strong>Total Price<p>:</p></strong></p>
                            <p style="margin-left: 5px;">Rp.
                                @foreach($reservation->bookings as $booking)
                                {{ $booking->total_price }}<br>
                                @endforeach</td>
                            </p>
                        </div>
                        {{-- <div style="display: flex;">
                            <p style="width: 150px;"><strong>Status Pay<p>:</p></strong></p>
                            <p style="margin-left: 5px;">@foreach ($reservation->payments as $payment)
                                <span>{{ $payment->status }}</span><br>
                        @endforeach</p>
                    </div>
                    <div id="totalPrice-{{ $reservation->id }}" class="hidden" style="display: flex;">
                        <p style="width: 150px;"><strong>Pay the Price<p>:</p></strong></p>
                        <p style="margin-left: 5px;">
                            @foreach ($reservation->payments as $payment)
                            Rp. {{ $payment->amount }}
                            @if ($payment->returns > 0)
                            (Returns: Rp. {{ $payment->returns }})
                            @endif
                            <br>
                            @endforeach
                        </p>
                    </div> --}}
                </div>
                {{-- <div>
                        @if ($reservation->total_harga_room > $reservation->payments()->sum('amount'))
                        <a href="#" id="paymentButton" onclick="showModal()" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-amber-500 focus:ring-primary-300 rounded-lg dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Payment
                        </a>
                        @endif
                    </div>
                    <div class="flex justify-end space-x-4">
                        @if ($reservation->payments()->sum('amount') == 0)
                        <!-- Show Invoice button -->
                        <a href="#" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-amber-500 hover:bg-amber-400 focus:ring-4 focus:ring-primary-300 rounded-lg dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6 h-3.5 w-3.5 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                            </svg>
                            Invoice
                        </a>
                        @else
                        <!-- Show Folios button -->
                        <a href="#" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-amber-500 hover:bg-amber-400 focus:ring-4 focus:ring-primary-300 rounded-lg dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6 h-3.5 w-3.5 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                            </svg>
                            Folios
                        </a>
                        @endif
                    </div>  --}}
            </div>
        </div>
        </div>
    </section>
    <script>
        // Function to show modal
        function showModal() {
            document.getElementById('paymentModal').classList.remove('hidden');
            document.getElementsByTagName('html')[0].classList.add('overflow-hidden');
        }

        // Function to close modal
        function closeModal() {
            document.getElementById('paymentModal').classList.add('hidden');
            document.getElementsByTagName('html')[0].classList.remove('overflow-hidden');
        }

    </script>
</x-layout>
