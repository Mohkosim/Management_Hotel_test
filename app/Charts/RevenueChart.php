<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Reservation;
use Carbon\Carbon;

class RevenueChart extends Chart
{
    protected $chart;

    public function __construct(LarapexChart $revenuechart)
    {
        $this->chart = $revenuechart;
    }

    public function build()
    {
        $tahun = date('Y');
        $bulan = date('m');
        for ($i = 1; $i <= $bulan; $i++) {
            $totalRevenue = Reservation::whereYear('check_in', $tahun)
                ->whereMonth('check_in', $i)
                ->withSum('payments', 'amount')
                ->get()
                ->sum('payments_sum_amount');

            $dataBulan[] = Carbon::create()->month($i)->format('F');
            $totalDataRevenue[] = $totalRevenue;
        }
        // Membuat chart dengan data yang diambil
        return $this->chart->areaChart()
            ->setTitle('Revenue')
            ->setSubtitle('Revenue')
            ->addData('Revenue', $totalDataRevenue)
            ->setHeight(200)
            ->setXAxis($dataBulan);
    }
}
