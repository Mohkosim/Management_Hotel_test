<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    {{-- Breadcrumbs --}}
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse px-4 lg:px-12">
            <li class="inline-flex items-center">
                <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    Housekeeping
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">List</a>
                </div>
            </li>
        </ol>
    </nav>

    {{-- Title --}}
    <h3 class="text-3xl font-bold dark:text-white px-4 lg:px-12">Housekeeping</h3>


    {{-- search dan date --}}
    <div class="flex items-center max-w-sm ml-7 mt-6">
        {{-- search --}}
        <form class="flex items-center w-full mr-2">
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2" />
                    </svg>
                </div>
                <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Unit.." required />
            </div>
            <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
                <span class="sr-only">Search</span>
            </button>
        </form>

        {{-- date --}}
        <div class="relative max-w-9">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                </svg>
            </div>
            <input datepicker id="default-datepicker" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
        </div>
    </div>

    {{-- Table --}}
    <section class="bg-white dark:bg-gray-900 sm:p-0">
        <div class="mt-3 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4 p-3">
            {{-- Reservation --}}
            <div class="bg-white shadow-md border-gray-300 rounded-lg dark:border-gray-600 p-4">
                <header class="flex justify-center mb-4">
                    <span class="flex initial ml-2 w-64 text-lg font-medium">Reservations with assigned units</span>
                </header>
                <div class="grid grid-cols-3 text-center">
                    <div>
                        <span class="text-3xl font-bold text-gray-900"></span>
                        <p class="text-sm text-gray-500">Departing</p>
                    </div>
                    <div>
                        <span class="text-3xl font-bold text-gray-900"></span>
                        <p class="text-sm text-gray-500">Arriving</p>
                    </div>
                    <div>
                        <span class="text-3xl font-bold text-gray-900"></span>
                        <p class="text-sm text-gray-500">Stay-th</p>
                    </div>
                </div>
            </div>


            {{-- Occupied --}}
            <div class="bg-white shadow-md border-gray-300 rounded-lg dark:border-gray-600 h-32 md:h-64">
                <header class="flex justify-center mb-4">

                    <span class="flex initial ml-2 w-64 text-lg font-medium">Occupied units</span>
                </header>
                <div class="grid grid-cols-3 text-center">
                    <div>
                        <span class="text-3xl font-bold text-gray-900"></span>
                        <p class="text-sm text-gray-500">Dirty</p>
                    </div>
                    <div>
                        <span class="text-3xl font-bold text-gray-900"></span>
                        <p class="text-sm text-gray-500">Inspect</p>
                    </div>
                    <div>
                        <span class="text-3xl font-bold text-gray-900"></span>
                        <p class="text-sm text-gray-500">Clean</p>
                    </div>
                </div>

            </div>

            {{-- Free Units --}}
            <div class="bg-white shadow-md border-gray-300 rounded-lg dark:border-gray-600 h-32 md:h-64">
                <header class="flex justify-center mb-4">
                    <span class="flex initial ml-2 w-64 text-lg font-medium">Free units</span>
                </header>
                <div class="grid grid-cols-3 text-center">
                    <div>
                        <span class="text-3xl font-bold text-gray-900"></span>
                        <p class="text-sm text-gray-500">Dirty</p>
                    </div>
                    <div>
                        <span class="text-3xl font-bold text-gray-900"></span>
                        <p class="text-sm text-gray-500">Inspect</p>
                    </div>
                    <div>
                        <span class="text-3xl font-bold text-gray-900"></span>
                        <p class="text-sm text-gray-500">Clean</p>
                    </div>
                </div>
            </div>

            {{-- Maintenances --}}
            <div class="bg-white shadow-md border-gray-300 rounded-lg dark:border-gray-600 h-32 md:h-64">
                <header class="flex justify-center mb-4">

                    <span class="flex initial ml-2 w-64 text-lg font-medium">Maintenances</span>
                </header>
                <div class="grid grid-cols-3 text-center">
                    <div>
                        <span class="text-3xl font-bold text-gray-900"></span>
                        <p class="text-sm text-gray-500">Out Of Services</p>
                    </div>
                    <div>
                        <span class="text-3xl font-bold text-gray-900"></span>
                        <p class="text-sm text-gray-500">Out Of Order Units</p>
                    </div>
                    <div>
                        <span class="text-3xl font-bold text-gray-900">0</span>
                        <p class="text-sm text-gray-500">None</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- table --}}
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Unit</th>
                        <th scope="col" class="px-6 py-3">Unit Group</th>
                        <th scope="col" class="px-6 py-3 text-center">Current Condition</th>
                        <th scope="col" class="px-6 py-3">Current Status</th>
                        <th scope="col" class="px-6 py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($inventories as $inventory)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $inventory->unit->name }}
                        </th>
                        <td class="px-6 py-4">{{ $inventory->unitgroup->type }}</td>
                        <td class="px-6 py-4 text-center">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white mx-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5" />
                            </svg>
                            Marks as Clean
                        </td>
                        <td class="px-6 py-4">Free</td>
                        <td class="px-6 py-4 text-center">
                            <div class="relative">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white mx-auto cursor-pointer" onclick="toggleMenu(event)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M12 6h.01M12 12h.01M12 18h.01" />
                                </svg>
                                <div class="absolute hidden mt-2 left-0 w-48 bg-white border border-gray-300 rounded shadow-lg z-10">
                                    <div class="p-2 text-gray-800 hover:bg-gray-100 cursor-pointer" onclick="markAsClean()">
                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 text-green-600 mr-2" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M10 15l-3-3 1.414-1.414L10 12.586l7.586-7.586L19 7l-9 9z" />
                                            </svg>
                                            Marks as Clean
                                        </span>
                                    </div>
                                    <div class="p-2 text-gray-800 hover:bg-gray-100 cursor-pointer">Clean to be Inspected</div>
                                    <div class="p-2 text-gray-800 hover:bg-gray-100 cursor-pointer" onclick="markAsDirty()">Marks as Dirty</div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        {{-- untuk button actions ditable --}}
        <script>
            function toggleMenu(event) {
                event.stopPropagation(); // Prevents the click event from bubbling up
                const dropdown = event.currentTarget.nextElementSibling;
                const menus = document.querySelectorAll('.absolute');

                // Hide all dropdowns
                menus.forEach(menu => {
                    if (menu !== dropdown) {
                        menu.classList.add('hidden');
                    }
                });

                // Toggle the visibility of the clicked dropdown
                dropdown.classList.toggle('hidden');
            }

            document.addEventListener('click', function(event) {
                if (!event.target.closest('.relative')) {
                    const menus = document.querySelectorAll('.absolute');
                    menus.forEach(menu => {
                        menu.classList.add('hidden');
                    });
                }
            });

        </script>

        {{-- pagination --}}
        <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
            <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                Showing
                <span class="font-semibold text-gray-900 dark:text-white">1 to 5</span>
                of
                <span class="font-semibold text-gray-900 dark:text-white">20</span>
            </span>
            <ul class="inline-flex items-stretch -space-x-px">
                <li>
                    <a href="#" class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <span class="sr-only">Previous</span>
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                </li>
                <li>
                    <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                </li>
                <li>
                    <a href="#" aria-current="page" class="flex items-center justify-center text-sm z-10 py-2 px-3 leading-tight text-primary-600 bg-primary-50 border border-primary-300 hover:bg-primary-100 hover:text-primary-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                </li>
                <li>
                    <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">...</a>
                </li>
                <li>
                    <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">100</a>
                </li>
                <li>
                    <a href="#" class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <span class="sr-only">Next</span>
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </li>
            </ul>
        </nav>
    </section>
</x-layout>
