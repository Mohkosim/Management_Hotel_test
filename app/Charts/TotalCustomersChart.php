<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Guest;
use Carbon\Carbon;

class TotalCustomersChart extends Chart
{
    protected $chart;

    public function __construct(LarapexChart $totalChart)
    {
        $this->chart = $totalChart;
    }

    public function build()
    {
        $tahun = date('Y');
        $bulan = date('m');
        for ($i = 1; $i <= $bulan; $i++) {
            $totalCustomer = Guest::whereYear('created_at', $tahun)
                ->whereMonth('created_at', $i)
                ->count();

            $dataBulan[] = Carbon::create()->month($i)->format('F');
            $totalDataCustomer[] = $totalCustomer;
        }

        return $this->chart->lineChart()
            ->setTitle('Total Customers')
            ->addData('Total Customers', $totalDataCustomer)
            ->setHeight(300)
            ->setXAxis($dataBulan);
    }
}
