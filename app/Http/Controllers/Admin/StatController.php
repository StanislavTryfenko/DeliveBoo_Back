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
		/* accedi ai dati del ristorante corrente; reindirizza alla registrazione se non esiste */
		$currentUser = Auth::id();
		$currentRestaurant = Restaurant::where('user_id', $currentUser)->first();
		if (!$currentRestaurant) {
			return redirect()->route('admin.dashboard')->with('error', 'Ristorante non trovato.');
		}

		$selectedPeriod = $request->input('period', 'last12'); //default ultimi 12 mesi

		$endDate = now();
		$startDate = match ($selectedPeriod) {
			'last12' => now()->subMonths(12),
			'last13-24' => now()->subMonths(24)->startOfMonth(),
			'last25-36' => now()->subMonths(36)->startOfMonth(),
			default => now()->subMonths(12),
		};

		$orders = DB::table('orders')
			->select(
				DB::raw('MONTH(date) as month'),
				DB::raw('YEAR(date) as year'),
				DB::raw('COUNT(id) as order_count'),
				DB::raw('SUM(total_price) as total_sum')
			)
			->where('restaurant_id', $currentRestaurant->id)
			->whereBetween('date', [$startDate, $endDate])
			->groupBy(DB::raw('YEAR(date), MONTH(date)'))
			->get();

		//mi creo un array di mesi per sostituirli in mase agli indici successivamente
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

		/* inizializza mesi dal periodo selezionato */
		$periodMonths = [];
		for ($i = 0; $i < 12; $i++) {
			$month = (int) $startDate->copy()->addMonths($i)->format('m');
			$year = (int) $startDate->copy()->addMonths($i)->format('Y');
			$periodMonths["$year-$month"] = [
				'month' => $month,
				'year' => $year,
				'order_count' => 0,
				'total_sum' => 0.0,
			];
		}

		/* dalla query alle variabili */
		foreach ($orders as $order) {
			$key = "$order->year-$order->month";
			if (isset($periodMonths[$key])) {
				$periodMonths[$key]['order_count'] = $order->order_count;
				$periodMonths[$key]['total_sum'] = $order->total_sum;
			}
		}

		/* labels e variabili per la chart */
		foreach ($periodMonths as $period) {
			$labels[] = $months[$period['month']] . ' ' . $period['year'];
			$orderCounts[] = $period['order_count'];
			$totalSums[] = $period['total_sum'];
		}

		$chartjs = app()->chartjs
			->name('ordersChart')
			->type('bar')
			->labels($labels)
			->datasets([
				[
					"label" => "Somma Totale degli Ordini",
					'backgroundColor' => 'rgba(255, 99, 132, 0.6)',
					'borderColor' => 'rgba(255, 99, 132, 1)',
					"data" => $totalSums,
					"order" => 1,
					"yAxisID" => "totalAxis",
				],
				[
					"label" => "Numero di Ordini",
					'backgroundColor' => 'rgba(75, 192, 192, 0.6)',
					'borderColor' => 'rgba(75, 192, 192, 1)',
					"data" => $orderCounts,
					"order" => 2,
					"yAxisID" => "ordersAxis",
				]
			])
			->options([
				'scales' => [
					'ordersAxis' => [
						'type' => 'linear',
						'position' => 'right',
						'ticks' => [
							'beginAtZero' => true,
							'stepSize' => 2
						],
						'grid' => [
							'display' => false
						]
					],
					'totalAxis' => [
						'type' => 'linear',
						'position' => 'left',
						'ticks' => [
							'beginAtZero' => true,
							'stepSize' => 200
						],
					],
				],
			]);

		return view('admin.stats.index', compact('chartjs', 'selectedPeriod'));
	}
}
