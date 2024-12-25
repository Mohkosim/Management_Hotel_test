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
                    <a href="{{ route('reservations.edit', ['id' => $reservation->id, 'edit' => 1]) }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Edit</a>
                </div>
            </li>
        </ol>
    </nav>


    {{-- Title --}}
    <h3 class="text-3xl font-bold dark:text-white px-4 lg:px-12">Reservations</h3>

    @if ($edit == 1)
    <section class="bg-white dark:bg-gray-900">
        <div class="bg-white border border-gray-200 rounded-lg shadow py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Edit Reservation Details</h2>
            <form id="edit-reservation-form" action="{{ route('reservations.update1', $reservation->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

                    <div class="w-full">
                        <label for="arrival_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Arrival Date</label>
                        <input type="date" name="arrival_date" id="arrival_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('arrival_date', $reservation->arrival_date) }}" required>
                        @error('check_out')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="departure_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Departure Date</label>
                        <input type="date" name="departure_date" id="departure_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('departure_date', $reservation->departure_date) }}" required>
                        @error('check_out')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="room_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Booking Rooms</label>
                        <select id="room_type" name="inventory_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected disabled>Select a room type</option>
                            @foreach($unitGroups as $unitGroup)
                            <option value="{{ $unitGroup->id }}" {{ $reservation->inventory_id == $unitGroup->id ? 'selected' : '' }}>{{ $unitGroup->type }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="booking_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Booking Date</label>
                        <input type="date" name="booking_date" id="booking-date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="" />
                    </div>
                </div>
                <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-amber-500 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-700 hover:bg-amber-600">
                    Continue
                </button>
            </form>
        </div>
    </section>

    @elseif ($edit == 2)
    <section class="bg-white dark:bg-gray-900">
        <div class="bg-white border border-gray-200 rounded-lg shadow py-8 px-4 mx-auto max-w-2xl lg:py-8">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Edit guest</h2>
            <form id="edit-reservation-form" action="{{ route('reservations.update2', $reservation->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type name" required autofocus value="{{ old('name', $reservation->booker->guest->name) }}">
                    </div>
                    <div class="w-full">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="text" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type email" required value="{{ old('email', $reservation->booker->guest->email) }}">
                    </div>
                    <div class="w-full">
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                        <input type="text" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type phone" required value="{{ old('phone', $reservation->booker->guest->phone) }}">
                    </div>
                    <div>
                        <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                        <select id="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" name="gender">
                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>
                    <div class="w-full" inline-datepicker data-date="02/25/2022">
                        <label for="date_of_birth" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of Birth</label>
                        <input type="date" name="date_of_birth" id="date_of_birth" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="dd-mm-yyyy" required value="{{ old('date_of_birth', $reservation->booker->guest->date_of_birth) }}">
                    </div>
                    <div class="w-full">
                        <label for="place_of_birth" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Place of Birth</label>
                        <input type="text" name="place_of_birth" id="place_of_birth" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type place of birth" required value="{{ old('place_of_birth', $reservation->booker->guest->place_of_birth) }}">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                        <textarea id="address" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Your address here" name="address" required>{{ old('address', $reservation->booker->guest->address ?? '') }}</textarea>
                    </div>
                    <div class="w-full">
                        <label for="postal_code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Postal Code</label>
                        <input type="text" name="postal_code" id="postal_code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type postal code" required value="{{ old('postal_code', $reservation->booker->guest->postal_code) }}">
                    </div>
                </div>
                <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-amber-500 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-700 hover:bg-amber-600">
                    Continue
                </button>
            </form>
        </div>
    </section>

    @elseif ($edit == 3)
    <section class="bg-white dark:bg-gray-900">
        <div class="bg-white border border-gray-200 rounded-lg shadow py-8 px-4 mx-auto max-w-2xl lg:py-8">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Edit booker</h2>
            <form id="edit-reservation-form" action="{{ route('reservations.update3', $reservation->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type name" required autofocus value="{{ old('name', $reservation->booker->name) }}">
                    </div>
                    <div class="w-full">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="text" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type email" required value="{{ old('email', $reservation->booker->email ) }}">
                    </div>
                    <div class="w-full">
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                        <input type="text" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type phone" required value="{{ old('phone', $reservation->booker->phone) }}">
                    </div>
                    <div>
                        <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                        <select id="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" name="gender">
                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>
                    <div class="w-full" inline-datepicker data-date="02/25/2022">
                        <label for="date_of_birth" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of Birth</label>
                        <input type="date" name="date_of_birth" id="date_of_birth" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="dd-mm-yyyy" required value="{{ old('date_of_birth', $reservation->booker->date_of_birth ) }}">
                    </div>
                    <div class="w-full">
                        <label for="place_of_birth" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Place of Birth</label>
                        <input type="text" name="place_of_birth" id="place_of_birth" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type place of birth" required value="{{ old('place_of_birth', $reservation->booker->place_of_birth ) }}">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                        <textarea id="address" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Your address here" name="address" required>{{ old('address', $reservation->booker->address) }}</textarea>
                    </div>
                    <div class="w-full">
                        <label for="postal_code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Postal Code</label>
                        <input type="text" name="postal_code" id="postal_code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type postal code" required value="{{ old('postal_code', $reservation->booker->postal_code) }}">
                    </div>
                </div>
                <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-amber-500 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-700 hover:bg-amber-600">
                    Submit
                </button>
            </form>
        </div>
    </section>
    @endif

    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.1.0/dist/js/multi-select-tag.js"></script>

    <script>
        // Mendapatkan elemen input tanggal
        const bookingDateInput = document.getElementById('booking-date');

        // Mendapatkan tanggal saat ini
        const today = new Date().toISOString().split('T')[0];

        // Mengatur nilai input tanggal dengan tanggal saat ini
        bookingDateInput.value = today;
    </script>

</x-layout>
