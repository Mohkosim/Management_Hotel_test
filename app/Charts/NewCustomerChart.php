<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Guest;
use Carbon\Carbon;

class NewCustomerChart extends Chart
{
    protected $chart;

    public function __construct(LarapexChart $newChart)
    {
        $this->chart = $newChart;
    }

    public function build()
    {

        $tahun = date('Y');
        $bulan = date('m');
        for ($i = 1; $i <= $bulan; $i++) {
            $newCustomer = Guest::whereYear('created_at', $tahun)
                ->whereMonth('created_at', $i)
                ->count();

            $dataBulan[] = Carbon::create()->month($i)->format('F');
            $totalDataCustomer[] = $newCustomer;
        }
        return $this->chart->areaChart()
            ->setTitle('New Customers')
            ->setSubtitle('New Customers')
            ->addData('New Customers', $totalDataCustomer)
            ->setHeight(200)
            ->setXAxis($dataBulan);
    }
}
