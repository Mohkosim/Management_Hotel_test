<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Reservation;
use Carbon\Carbon;

class NewOrdersChart extends Chart
{
    protected $chart;

    public function __construct(LarapexChart $orderChart)
    {
        $this->chart = $orderChart;
    }

    public function build()
    {

        $tahun = date('Y');
        $bulan = date('m');
        for ($i = 1; $i <= $bulan; $i++) {
            $newOrders = Reservation::whereYear('check_in', $tahun)
                ->whereMonth('check_in', $i)
                ->count();

            $dataBulan[] = Carbon::create()->month($i)->format('F');
            $totalDataOrder[] = $newOrders;
        }
        return $this->chart->areaChart()
            ->setTitle('New Orders')
            ->setSubtitle('New Orders')
            ->addData('New Orders', $totalDataOrder)
            ->setHeight(200)
            ->setXAxis($dataBulan);
    }
}
