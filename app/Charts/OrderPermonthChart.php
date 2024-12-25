<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Reservation;
use Carbon\Carbon;

class OrderPermonthChart extends Chart
{
    protected $chart;


    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build()
    {

        $tahun = date('Y');
        $bulan = date('m');
        for ($i = 1; $i <= $bulan; $i++) {
            $orderPerbulan = Reservation::whereYear('check_in', $tahun)
                ->whereMonth('check_in', $i)
                ->count();

            $dataBulan[] = Carbon::create()->month($i)->format('F');
            $totalDataOrder[] = $orderPerbulan;
        }

        return $this->chart->lineChart()
            ->setTitle('Orders per month')
            ->addData('Orders per month', $totalDataOrder)
            ->setHeight(300)
            ->setXAxis($dataBulan);
    }
}
