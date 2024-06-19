<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    public function getAllRestaurants()
    {
        $allRestaurants = Restaurant::with('types','dishes')->orderByDesc('id')->paginate(9);

        return response()->json([
            "success" => true,
            "response" => $allRestaurants,
        ]);
    }
}
