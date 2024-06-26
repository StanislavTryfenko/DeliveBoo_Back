<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Restaurant;

class StatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $currentUser = Auth::id();

        $currentRestaurant = Restaurant::where('user_id', $currentUser)->first();

        if (!$currentRestaurant) {
            return redirect()->route('admin.dashboard')->with('error', 'Ristorante non trovato.');
        }

        $selectedYear = $request->input('year', 2023);

        $orders = DB::table('orders')
            ->select(
                DB::raw('MONTH(date) as month'),
                DB::raw('COUNT(id) as order_count'),
                DB::raw('SUM(total_price) as total_sum')
            )
            ->where('restaurant_id', $currentRestaurant->id)
            ->whereYear('date', $selectedYear)
            ->groupBy(DB::raw('MONTH(date)'))
            ->get();

        $months = [
            1 => 'Gennaio',
            2 => 'Febbraio',
            3 => 'Marzo',
            4 => 'Aprile',
            5 => 'Maggio',
            6 => 'Giugno',
            7 => 'Luglio',
            8 => 'Agosto',
            9 => 'Settembre',
            10 => 'Ottobre',
            11 => 'Novembre',
            12 => 'Dicembre',
        ];

        $labels = [];
        $orderCounts = [];
        $totalSums = [];

        foreach ($orders as $order) {
            $labels[] = $months[$order->month];
            $orderCounts[] = $order->order_count;
            $totalSums[] = $order->total_sum;
        }

        $chartjs = app()->chartjs
            ->name('ordersChart')
            ->type('bar')
            ->labels($labels)
            ->datasets([
                [
                    "label" => "Numero di Ordini",
                    'backgroundColor' => 'rgba(75, 192, 192, 0.6)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    "data" => $orderCounts,
                    "order" => 1,
                    "yAxisID" => "ordersAxis",
                ],
                [
                    "label" => "Somma Totale degli Ordini",
                    'backgroundColor' => 'rgba(255, 99, 132, 0.6)',
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    "data" => $totalSums,
                    "order" => 2,
                    "yAxisID" => "totalAxis",
                ]
            ])
            ->options([
                'scales' => [
                    'yAxes' => [
                        [
                            'id' => 'ordersAxis',
                            'type' => 'linear',
                            'position' => 'left',
                            'ticks' => [
                                'beginAtZero' => true,
                                'stepSize' => 1,
                                'max' => 20
                            ],
                        ],
                        [
                            'id' => 'totalAxis',
                            'type' => 'linear',
                            'position' => 'right',
                            'ticks' => [
                                'beginAtZero' => true,
                                'stepSize' => 400,
                                'max' => 2000
                            ],
                        ],
                    ],
                ],
            ]);

        return view('admin.stats.index', compact('chartjs', 'selectedYear'));
    }
}
