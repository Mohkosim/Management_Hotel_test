<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    {{-- Breadcrumbs --}}
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center px-4 space-x-1 md:space-x-2 rtl:space-x-reverse lg:px-12">
            <li class="inline-flex items-center">
                <a href="#"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    Housekeeping
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="#"
                        class="text-sm font-medium text-gray-700 ms-1 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">List</a>
                </div>
            </li>
        </ol>
    </nav>

    {{-- Title --}}
    <h3 class="px-4 text-3xl font-bold dark:text-white lg:px-12">Housekeeping</h3>


    {{-- search dan date --}}
    <div class="flex items-center max-w-sm mt-6 ml-7">
        {{-- search --}}
        <form class="flex items-center w-full mr-2">
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2" />
                    </svg>
                </div>
                <input type="text" id="simple-search"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search Unit.." required />
            </div>
            <button type="submit"
                class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
                <span class="sr-only">Search</span>
            </button>
        </form>

        {{-- date --}}
        <div class="relative max-w-9">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                </svg>
            </div>
            <input datepicker id="default-datepicker" type="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Select date">
        </div>
    </div>

    {{-- Table --}}
    <section class="bg-white dark:bg-gray-900 sm:p-0">
        <div class="grid grid-cols-1 gap-4 p-3 mt-3 mb-4 sm:grid-cols-2 lg:grid-cols-4">
            {{-- Reservation --}}
            {{--  <div class="p-4 bg-white border-gray-300 rounded-lg shadow-md dark:border-gray-600">
                <header class="flex justify-center mb-4">
                    <span class="flex w-64 ml-2 text-lg font-medium initial">Reservations with assigned units</span>
                </header>
                <div class="grid grid-cols-3 text-center">
                    <div>
                        <span class="text-3xl font-bold text-gray-900">0</span>
                        <p class="text-sm text-gray-500">Departing</p>
                    </div>
                    <div>
                        <span class="text-3xl font-bold text-gray-900">0</span>
                        <p class="text-sm text-gray-500">Arriving</p>
                    </div>
                    <div>
                        <span class="text-3xl font-bold text-gray-900">0</span>
                        <p class="text-sm text-gray-500">Stay-th</p>
                    </div>
                </div>
            </div>  --}}


            {{-- Occupied --}}
            {{--  <div class="h-32 p-4 bg-white border-gray-300 rounded-lg shadow-md dark:border-gray-600 md:h-64">
                <header class="flex justify-center mb-4">
                    <span class="flex w-64 ml-2 text-lg font-medium initial">Occupied units</span>
                </header>
                <div class="grid grid-cols-3 text-center mt-11 ">
                    <div>
                        <span class="text-3xl font-bold text-gray-900">0</span>
                        <p class="text-sm text-gray-500">Dirty</p>
                    </div>
                    <div>
                        <span class="text-3xl font-bold text-gray-900">0</span>
                        <p class="text-sm text-gray-500">Inspect</p>
                    </div>
                    <div>
                        <span class="text-3xl font-bold text-gray-900">0</span>
                        <p class="text-sm text-gray-500">Clean</p>
                    </div>
                </div>

            </div>  --}}

            {{-- Free Units --}}
            <div class="h-32 p-4 bg-white border-gray-300 rounded-lg shadow-md dark:border-gray-600 md:h-64">
                <header class="flex justify-center mb-4">
                    <span class="flex w-64 ml-2 text-lg font-medium initial">Free units</span>
                </header>
                <div class="grid grid-cols-3 text-center mt-11">
                    <div>
                        <span class="text-3xl font-bold text-gray-900">{{ $dirtyUnits }}</span>
                        <p class="text-sm text-gray-500">Dirty</p>
                    </div>
                    <div>
                        <span class="text-3xl font-bold text-gray-900">{{ $inspectUnits }}</span>
                        <p class="text-sm text-gray-500">Inspect</p>
                    </div>
                    <div>
                        <span class="text-3xl font-bold text-gray-900">{{ $cleanUnits }}</span>
                        <p class="text-sm text-gray-500">Clean</p>
                    </div>
                </div>
            </div>

            {{-- Maintenances --}}
            {{--  <div class="h-32 p-4 bg-white border-gray-300 rounded-lg shadow-md dark:border-gray-600 md:h-64">
                <header class="flex justify-center mb-4">

                    <span class="flex w-64 ml-2 text-lg font-medium initial">Maintenances</span>
                </header>
                <div class="grid grid-cols-3 text-center mt-11">
                    <div>
                        <span class="text-3xl font-bold text-gray-900">0</span>
                        <p class="text-sm text-gray-500">Out Of Services</p>
                    </div>
                    <div>
                        <span class="text-3xl font-bold text-gray-900">0</span>
                        <p class="text-sm text-gray-500">Out Of Order Units</p>
                    </div>
                    <div>
                        <span class="text-3xl font-bold text-gray-900">0</span>
                        <p class="text-sm text-gray-500">None</p>
                    </div>
                </div>
            </div>  --}}
        </div>

        {{-- table --}}
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Unit</th>
                        <th scope="col" class="px-6 py-3">Unit Group</th>
                        <th scope="col" class="px-6 py-3 text-center">Current Condition</th>
                        <th scope="col" class="px-6 py-3">Current Status</th>
                    </tr>
                </thead>
                @if ($inventories->count())
                    <tbody>
                        @foreach ($inventories as $inventory)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $inventory->unit->name }}
                                </th>
                                <td class="px-6 py-4">{{ $inventory->unitgroup->type }}</td>
                                <td class="px-6 py-4 text-center">
                                    @php
                                        $currentCondition = $housekeepings
                                            ->where('unit_id', $inventory->unit_id)
                                            ->first();
                                    @endphp

                                    @if ($currentCondition)
                                        @if ($currentCondition->current_condition == 'clean')
                                            <svg class="w-6 h-6 mx-auto text-gray-800 dark:text-white"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M5 11.917 9.724 16.5 19 7.5" />
                                            </svg>
                                        @elseif ($currentCondition->current_condition == 'dirty')
                                            <svg class="w-6 h-6 mx-auto text-gray-800 dark:text-white"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M17.133 12.632v-1.8a5.407 5.407 0 0 0-4.154-5.262.955.955 0 0 0 .021-.106V3.1a1 1 0 0 0-2 0v2.364a.933.933 0 0 0 .021.106 5.406 5.406 0 0 0-4.154 5.262v1.8C6.867 15.018 5 15.614 5 16.807 5 17.4 5 18 5.538 18h12.924C19 18 19 17.4 19 16.807c0-1.193-1.867-1.789-1.867-4.175Zm-13.267-.8a1 1 0 0 1-1-1 9.424 9.424 0 0 1 2.517-6.391A1.001 1.001 0 1 1 6.854 5.8a7.43 7.43 0 0 0-1.988 5.037 1 1 0 0 1-1 .995Zm16.268 0a1 1 0 0 1-1-1A7.431 7.431 0 0 0 17.146 5.8a1 1 0 0 1 1.471-1.354 9.424 9.424 0 0 1 2.517 6.391 1 1 0 0 1-1 .995ZM8.823 19a3.453 3.453 0 0 0 6.354 0H8.823Z" />
                                            </svg>
                                        @elseif ($currentCondition->current_condition == 'Inspect')
                                            <svg class="w-6 h-6 mx-auto text-gray-800 dark:text-white"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M13.09 3.294c1.924.95 3.422 1.69 5.472.692a1 1 0 0 1 1.438.9v9.54a1 1 0 0 1-.562.9c-2.981 1.45-5.382.24-7.25-.701a38.739 38.739 0 0 0-.622-.31c-1.033-.497-1.887-.812-2.756-.77-.76.036-1.672.357-2.81 1.396V21a1 1 0 1 1-2 0V4.971a1 1 0 0 1 .297-.71c1.522-1.506 2.967-2.185 4.417-2.255 1.407-.068 2.653.453 3.72.967.225.108.443.216.655.32Z" />
                                            </svg>
                                        @else
                                            <svg class="w-6 h-6 mx-auto text-gray-500" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" />
                                            </svg>
                                        @endif
                                        {{ $currentCondition->current_condition }}
                                    @else
                                        No Condition
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    {{ $currentCondition ? $currentCondition->current_status : 'No Condition' }}
                                </td>
                                <td class="flex items-center px-4 py-3">
                                    <button
                                        id="{{ $currentCondition ? $currentCondition->id : 'default-dropdown-button' }}-dropdown-button"
                                        data-dropdown-toggle="{{ $currentCondition ? $currentCondition->id : 'default-dropdown' }}"
                                        class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                            viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>

                                    <div id="{{ $currentCondition ? $currentCondition->id : 'default-dropdown' }}"
                                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                            aria-labelledby="{{ $currentCondition ? $currentCondition->id : 'default-dropdown-button' }}">
                                            <li>
                                                <form
                                                    action="{{ route('housekeeping.updateStatus', ['id' => $currentCondition->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <input type="hidden" name="status" value="clean">
                                                    <button type="submit"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Marks
                                                        as Clean</button>
                                                </form>
                                            </li>
                                            <li>
                                                <form
                                                    action="{{ route('housekeeping.updateStatus', ['id' => $currentCondition->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <input type="hidden" name="status" value="Inspect">
                                                    <button type="submit"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Clean
                                                        to be Inspected</button>
                                                </form>
                                            </li>
                                            <li>
                                                <form
                                                    action="{{ route('housekeeping.updateStatus', ['id' => $currentCondition->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <input type="hidden" name="status" value="dirty">
                                                    <button type="submit"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg -gray-600 dark:hover:text-white">Marks
                                                        as Dirty</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

            </table>
        </div>


        {{-- pagination --}}
        <nav class="flex flex-col items-start justify-between p-4 space-y-3 md:flex-row md:items-center md:space-y-0"
            aria-label="Table navigation">
            <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                Showing
                <span class="font-semibold text-gray-900 dark:text-white">1 to 5</span>
                of
                <span class="font-semibold text-gray-900 dark:text-white">20</span>
            </span>
            <ul class="inline-flex items-stretch -space-x-px">
                <li>
                    <a href="#"
                        class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <span class="sr-only">Previous</span>
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                </li>
                <li>
                    <a href="#" aria-current="page"
                        class="z-10 flex items-center justify-center px-3 py-2 text-sm leading-tight border text-primary-600 bg-primary-50 border-primary-300 hover:bg-primary-100 hover:text-primary-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">...</a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">100</a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <span class="sr-only">Next</span>
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </li>
            </ul>
        </nav>
    @else
        <div class="grid max-w-lg mx-auto text-center justify-items-center">
            <div class="p-3 mb-4 bg-gray-100 rounded-full dark:bg-gray-500/20">
                <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                    data-slot="icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"></path>
                </svg>
            </div>

            <h4 class="text-base font-semibold leading-6 text-gray-950 dark:text-white">
                No housekeeping
            </h4>
        </div>
        @endif

    </section>
</x-layout>
