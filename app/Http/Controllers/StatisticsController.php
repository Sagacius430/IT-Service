<?php

namespace App\Http\Controllers;

use App\{Statistic, Os};
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

/**
 * Undocumented class
 *
 * @author Alexandre Unruh <alexandre@unruh.com.br>
 */
class StatisticsController extends Controller
{

    /**
     * Get Order statistics today
     *
     * @return Illuminate\Http\Response;
     */
    public function ordersToday()
    {
        $min_config = config('statistics.min_hours_to_display');
        $time = date('H');
        $min_hours = $time > $min_config ? $time : $min_config;
        $hours = [];
        for ($i = 0; $i <= $min_hours; $i++) {
            $hours[$i] = 0;
        }

        $data = Os::select('hour', DB::raw('COUNT(id) as orders'))
            ->whereDate('created_at', date('Y-m-d'))
            ->groupBy('hour')
            ->orderBy('orders', 'desc')
            ->get()
            ->toArray();

        foreach ($data as $res) {
            $hours[$res['hour']] = $res['orders'];
        }

        return $hours;
    }

    /**
     * Get Order statistics for the current month
     *
     * @return Illuminate\Http\Response;
     */
    public function ordersInMonth()
    {
        $min_config = config('statistics.min_days_to_display');
        $time = date('d');
        $min_days = $time > $min_config ? $time : $min_config;
        $days = [];
        for ($i = 1; $i < $min_days; $i++) {
            $days[$i] = 0;
        }

        $data = Os::select('day', DB::raw('COUNT(id) as orders'))
            ->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->groupBy('day')
            ->orderBy('orders', 'desc')
            ->get()
            ->toArray();

        foreach ($data as $res) {
            $days[$res['day']] = $res['orders'];
        }

        return $days;
    }

    /**
     * Get Order statistics for the current year
     *
     * @return Illuminate\Http\Response;
     */
    public function ordersInYear()
    {
        $min_config = config('statistics.min_months_to_display');
        $labels = config('statistics.months');
        $months = [];
        for ($i = 1; $i <= $min_config; $i++) {
            $months[$labels[$i]] = 0;
        }

        $data = Os::select('month', DB::raw('COUNT(id) as orders'))
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('orders', 'desc')
            ->get()
            ->toArray();

        foreach ($data as $res) {
            $months[$res['month']] = $res['orders'];
        }

        return $months;
    }

    /**
     * Get statistics of a specific data on a specific period
     *
     * @param string $column order table column 
     * @param string $date [today, month or year]
     * @param integer $limit 
     * @return Illuminate\Http\Response;
     */
    public function columnStats($column, $date = 'today', $limit = -1)
    {
        $response = [];
        $data = Os::select($column, DB::raw('COUNT(id) as orders'));

        if ($date == 'year') {
            $data->whereYear('created_at', date('Y'));
        } elseif ($date == 'month') {
            $data->whereYear('created_at', date('Y'))->whereMonth('created_at', date('m'));
        } else {
            $data->whereDate('created_at', date('Y-m-d'));
        }

        $data->groupBy($column)
            ->limit($limit)
            ->orderBy('orders', 'desc');

        foreach ($data->get()->toArray() as $res) {
            $response[$res[$column]] = $res['orders'];
        }

        return $response;
    }
}