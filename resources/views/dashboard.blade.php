@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.53.0/apexcharts.min.js" integrity="sha512-QbaChpzUJcRVsOFtDhh/VZMuljqvlPRIhIXsvfREDZcdqzIKdNvAhwrgW+flSxtbxK/BFpdX1y5NSO6bSYHlOA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.53.0/apexcharts.min.css" integrity="sha512-w3pXofOHrtYzBYpJwC6TzPH6SxD6HLAbT/rffdkA759nCQvYi5AHy5trNWFboZnj4xtdyK0AFMBtck9eTmwybg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

{{-- Revenue  --}}
<script>
    var options = {
        series: [{
            name: 'Revenue'
            , data: @json($totalDataRevenue)
        }]
        , chart: {
            height: 205
            , type: 'area'
        }
        , dataLabels: {
            enabled: false
        }
        , title: {
            text: 'Revenue'
            , align: 'left'
        }
        , stroke: {
            curve: 'smooth'
        }
        , xaxis: {
            categories: @json($dataBulan)
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart-Rev"), options);
    chart.render();
</script>

{{-- New Customers  --}}
<script>
    var options = {
        series: [{
            name: 'New Customers'
            , data: @json($totalDataNewCustomer)
        }]
        , chart: {
            height: 205
            , type: 'area'
        }
        , dataLabels: {
            enabled: false
        }
        , title: {
            text: 'New Customers'
            , align: 'left'
        }
        , stroke: {
            curve: 'smooth'
        }
        , xaxis: {
            categories: @json($dataBulan)
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart-Customers"), options);
    chart.render();
</script>

{{-- New Orders  --}}
<script>
    var options = {
        series: [{
            name: 'New Orders'
            , data: @json($totalDataNewOrder)
        }]
        , chart: {
            height: 205
            , type: 'area'
        }
        , dataLabels: {
            enabled: false
        }
        , title: {
            text: 'New Orders'
            , align: 'left'
        }
        , stroke: {
            curve: 'smooth'
        }
        , xaxis: {
            categories: @json($dataBulan)
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart-Orders"), options);
    chart.render();
</script>

{{-- Order Permonth  --}}
<script>
    var options = {
        series: [{
            name: "Orders per month"
            , data: @json($totalDataOrder)
        }]
        , chart: {
            id: 'li'
            , group: 'social'
            , height: 300
            , type: 'area'
            , zoom: {
                enabled: true
            }
        }
        , dataLabels: {
            enabled: true
        }
        , stroke: {
            curve: 'straight'
        }
        , title: {
            text: 'Orders per month'
            , align: 'left'
        }
        , grid: {
            row: {
                colors: ['#f3f3f3', 'transparent']
                , opacity: 0.5
            }
        , }
        , xaxis: {
            categories: @json($dataBulan)
        , }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();

</script>

{{-- Total Customers  --}}
<script>
    var options = {
        series: [{
            name: "Total Customers"
            , data: @json($totalDataCustomer)
        }]
        , chart: {
            id: 'li'
            , group: 'social'
            , height: 300
            , type: 'area'
            , zoom: {
                enabled: true
            }
        }
        , dataLabels: {
            enabled: true
        }
        , stroke: {
            curve: 'straight'
        }
        , title: {
            text: 'Total Customers'
            , align: 'left'
        }
        , grid: {
            row: {
                colors: ['#f3f3f3', 'transparent']
                , opacity: 0.5
            }
        , }
        , xaxis: {
            categories: @json($dataBulan)
        , }
    };

    var chart = new ApexCharts(document.querySelector("#chart1"), options);
    chart.render();

</script>

@endsection

<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <h3 class="text-3xl font-bold dark:text-white px-4 lg:px-12">Dashboard</h3>
    <div class="mt-3 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4 p-3">
        <div class="bg-white shadow-md border-gray-300 rounded-lg dark:border-gray-600 h-32 md:h-64">
            <header class="flex mt-2 mx-3">
                <svg class="flex-none w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 6H5m2 3H5m2 3H5m2 3H5m2 3H5m11-1a2 2 0 0 0-2-2h-2a2 2 0 0 0-2 2M7 3h11a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1Zm8 7a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                </svg>
                <span class="flex initial ml-2 w-64 text-lg font-medium">Manage Guests</span>
            </header>
            <div class="mt-3 font-sm text-justify mx-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae amet quam architecto praesentium sequi a ad corrupti, commodi tempora optio.</div>
            <footer>
                <a href="/guests" class="mt-8 mx-3 px-3 py-2 text-xs font-medium text-center flex justify-center w-100 text-white bg-amber-500 rounded-lg hover:bg-amber-700 focus:ring-4 focus:outline-none focus:ring-amber-300 dark:bg-amber-500 dark:hover:bg-amber-500 dark:focus:ring-amber-700">
                    View guests
                </a>
            </footer>
        </div>

        <div class="bg-white shadow-md border-gray-300 rounded-lg dark:border-gray-600 h-32 md:h-64">
            <header class="flex mt-2 mx-3">
                <svg class="flex-none w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 4h12M6 4v16M6 4H5m13 0v16m0-16h1m-1 16H6m12 0h1M6 20H5M9 7h1v1H9V7Zm5 0h1v1h-1V7Zm-5 4h1v1H9v-1Zm5 0h1v1h-1v-1Zm-3 4h2a1 1 0 0 1 1 1v4h-4v-4a1 1 0 0 1 1-1Z" />
                </svg>
                <span class="flex initial ml-2 w-64 text-lg font-medium">Room rack</span>
            </header>
            <div class="mt-3 font-sm text-justify mx-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae amet quam architecto praesentium sequi a ad corrupti, commodi tempora optio.</div>
            <footer>
                <a href="/room/units" class="mt-8 mx-3 px-3 py-2 text-xs font-medium text-center flex justify-center w-100 text-white bg-amber-500 rounded-lg hover:bg-amber-700 focus:ring-4 focus:outline-none focus:ring-amber-300 dark:bg-amber-500 dark:hover:bg-amber-500 dark:focus:ring-amber-700">
                    View room rack
                </a>
            </footer>
        </div>

        <div class="bg-white shadow-md border-gray-300 rounded-lg dark:border-gray-600 h-32 md:h-64">
            <header class="flex mt-2 mx-3">
                <svg class="flex-none w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.079 6.839a3 3 0 0 0-4.255.1M13 20h1.083A3.916 3.916 0 0 0 18 16.083V9A6 6 0 1 0 6 9v7m7 4v-1a1 1 0 0 0-1-1h-1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1Zm-7-4v-6H5a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h1Zm12-6h1a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-1v-6Z" />
                </svg>
                <span class="flex initial ml-2 w-64 text-lg font-medium">Cashier report</span>
            </header>
            <div class="mt-3 font-sm text-justify mx-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae amet quam architecto praesentium sequi a ad corrupti, commodi tempora optio.</div>
            <footer>
                <a href="#" class="mt-8 mx-3 px-3 py-2 text-xs font-medium text-center flex justify-center w-100 text-white bg-amber-500 rounded-lg hover:bg-amber-700 focus:ring-4 focus:outline-none focus:ring-amber-300 dark:bg-amber-500 dark:hover:bg-amber-500 dark:focus:ring-amber-700">
                    View staff profile
                </a>
            </footer>
        </div>

        <div class="bg-white shadow-md border-gray-300 rounded-lg dark:border-gray-600 h-32 md:h-64">
            <header class="flex mt-2 mx-3">
                <svg class="flex-none w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v13H7a2 2 0 0 0-2 2Zm0 0a2 2 0 0 0 2 2h12M9 3v14m7 0v4" />
                </svg>
                <span class="flex initial ml-2 w-64 text-lg font-medium">Reservation</span>
            </header>
            <div class="mt-3 font-sm text-justify mx-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae amet quam architecto praesentium sequi a ad corrupti, commodi tempora optio.</div>
            <footer>
                <a href="/reservations" class="mt-8 mx-3 px-3 py-2 text-xs font-medium text-center flex justify-center w-100 text-white bg-amber-500 rounded-lg hover:bg-amber-700 focus:ring-4 focus:outline-none focus:ring-amber-300 dark:bg-amber-500 dark:hover:bg-amber-500 dark:focus:ring-amber-700">
                    View reservations
                </a>
            </footer>
        </div>
    </div>

    <div class="mt-3 grid grid-cols-1 sm:grid-cols-3 gap-4 mb-2 p-3">


        <div id="chart-Rev" class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-">
            {{-- {!! $revenueChart->container() !!}  --}}
        </div>

        <div id="chart-Customers" class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-">
            {{-- {!! $newChart->container() !!}  --}}
        </div>

        <div id="chart-Orders" class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-">
            {{-- {!! $orderChart->container() !!}  --}}
        </div>



    </div>

    <div class="mt-3 grid grid-cols-1 sm:grid-cols-2  gap-4 mb-4 p-3">
        <div id="chart" class=" w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
            {{-- {!! $chart->container() !!}  --}}
        </div>
        <div id="chart1" class=" w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
            {{-- {!! $totalChart->container() !!}  --}}
        </div>
    </div>


    {{--  <div class="bg-white shadow-md border-gray-300 dark:border-gray-600 h-96 mb-4 flex items-center justify-center">
        <div class="font-sm font-bold text-center">grafik reservasi bulan ini</div>
    </div>  --}}
</x-layout>
