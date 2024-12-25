<aside class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidenav" id="drawer-navigation">
    <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">

        <ul class="space-y-2">
            <li>
                <x-sidebar-link href="/" :active="request()->is('/')">Dashboard</x-sidebar-link>
            </li>

            <li>
                <button type="button" class="flex w-full items-center p-2 text-base font-medium {{ request()->is('room*') ? 'bg-amber-500 text-white hover:bg-amber-500 hover:text-white' : 'text-gray-900 hover:bg-gray-100'}} rounded-lg dark:text-white  dark:hover:bg-gray-700 group" aria-controls="dropdown-rooms" data-collapse-toggle="dropdown-rooms">
                    <svg class="w-6 h-6 {{ request()->is('room*') ? 'text-white' : 'text-gray-800' }} dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 4h12M6 4v16M6 4H5m13 0v16m0-16h1m-1 16H6m12 0h1M6 20H5M9 7h1v1H9V7Zm5 0h1v1h-1V7Zm-5 4h1v1H9v-1Zm5 0h1v1h-1v-1Zm-3 4h2a1 1 0 0 1 1 1v4h-4v-4a1 1 0 0 1 1-1Z" />
                    </svg>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap">Room
                    </span>
                    <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul id="dropdown-rooms" class="hidden py-2 space-y-2">
                    <li>
                        <a href="/room/unit-groups" class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Unit groups</a>
                    </li>
                    <li>
                        <a href="/room/units" class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Units</a>
                    </li>
                </ul>
            </li>

            {{-- <li>
                    <a
                        href="/guests"
                        class="flex items-center p-2 text-base font-medium {{ request()->is('guests*') ? 'bg-amber-500 text-white hover:bg-amber-500 hover:text-white' : 'text-gray-900 hover:bg-gray-100'}} rounded-lg dark:text-white dark:hover:bg-gray-700 group"
            >
            <svg class="w-6 h-6 {{ request()->is('guests*') ? 'text-white' : 'text-gray-800' }} text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 6H5m2 3H5m2 3H5m2 3H5m2 3H5m11-1a2 2 0 0 0-2-2h-2a2 2 0 0 0-2 2M7 3h11a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1Zm8 7a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
            </svg>
            <span class="ml-3">Guests</span>
            </a>
            </li> --}}

            <li>
                <a href="/reservations" class="flex items-center p-2 text-base font-medium {{ request()->is('reservations*') ? 'bg-amber-500 text-white hover:bg-amber-500 hover:text-white' : 'text-gray-900 hover:bg-gray-100'}} rounded-lg dark:text-white dark:hover:bg-gray-700 group">
                    <svg class="w-6 h-6 {{ request()->is('reservations*') ? 'text-white' : 'text-gray-800' }} text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v13H7a2 2 0 0 0-2 2Zm0 0a2 2 0 0 0 2 2h12M9 3v14m7 0v4" />
                    </svg>
                    <span class="ml-3">Reservations</span>
                </a>
            </li>

            <li>
                <a href="/housekeeping" class="flex items-center p-2 text-base font-medium {{ request()->is('housekeeping*') ? 'bg-amber-500 text-white hover:bg-amber-5z00 hover:text-white' : 'text-gray-900 hover:bg-gray-100'}} rounded-lg dark:text-white dark:hover:bg-gray-700 group">
                    <svg class="w-6 h-6 {{ request()->is('housekeeping*') ? 'text-white' : 'text-gray-800' }} text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.079 6.839a3 3 0 0 0-4.255.1M13 20h1.083A3.916 3.916 0 0 0 18 16.083V9A6 6 0 1 0 6 9v7m7 4v-1a1 1 0 0 0-1-1h-1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1Zm-7-4v-6H5a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h1Zm12-6h1a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-1v-6Z" />
                    </svg>
                    <span class="ml-3">Housekeeping</span>
                </a>
            </li>

            <li>
                <button type="button" class="flex w-full items-center p-2 text-base font-medium {{ request()->is('sales*') ? 'bg-amber-500 text-white hover:bg-amber-500 hover:text-white' : 'text-gray-900 hover:bg-gray-100'}} rounded-lg dark:text-white  dark:hover:bg-gray-700 group" aria-controls="dropdown-sales" data-collapse-toggle="dropdown-sales">
                    <svg class="w-6 h-6 {{ request()->is('sales*') ? 'text-white' : 'text-gray-800' }} dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 10V6a3 3 0 0 1 3-3v0a3 3 0 0 1 3 3v4m3-2 .917 11.923A1 1 0 0 1 17.92 21H6.08a1 1 0 0 1-.997-1.077L6 8h12Z" />
                    </svg>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap">Sales
                    </span>
                    <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul id="dropdown-sales" class="hidden py-2 space-y-2">
                    <li>
                        <a href="/sales/rate-plans" class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Rate plans</a>
                    </li>
                    <li>
                        <a href="/sales/services" class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Services</a>
                    </li>
                </ul>
            </li>

            <li>
                <button type="button" class="flex w-full items-center p-2 text-base font-medium {{ request()->is('finance*') ? 'bg-amber-500 text-white hover:bg-amber-500 hover:text-white' : 'text-gray-900 hover:bg-gray-100'}} rounded-lg dark:text-white  dark:hover:bg-gray-700 group" aria-controls="dropdown-finance" data-collapse-toggle="dropdown-finance">
                    <svg class="w-6 h-6 {{ request()->is('finance*') ? 'text-white' : 'text-gray-800' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M8 7V6a1 1 0 0 1 1-1h11a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1h-1M3 18v-7a1 1 0 0 1 1-1h11a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                    </svg>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap">Finance
                    </span>
                    <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul id="dropdown-finance" class="hidden py-2 space-y-2">
                    <li>
                        <a href="/finance/invoice" class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Invoices</a>
                    </li>
                    <li>
                        <a href="/finance/folios" class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Folios</a>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="pt-5 mt-5 space-y-2 border-t border-gray-200 dark:border-gray-700">
            <li>
                <a href="#" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="square" stroke-linejoin="round" stroke-width="2" d="M10 19H5a1 1 0 0 1-1-1v-1a3 3 0 0 1 3-3h2m10 1a3 3 0 0 1-3 3m3-3a3 3 0 0 0-3-3m3 3h1m-4 3a3 3 0 0 1-3-3m3 3v1m-3-4a3 3 0 0 1 3-3m-3 3h-1m4-3v-1m-2.121 1.879-.707-.707m5.656 5.656-.707-.707m-4.242 0-.707.707m5.656-5.656-.707.707M12 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    <span class="ml-3">Staff Management</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
