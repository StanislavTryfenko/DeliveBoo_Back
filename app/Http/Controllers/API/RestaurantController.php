<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Type;

class RestaurantController extends Controller
{
    public function getAllRestaurants()
    {
        $allRestaurants = Restaurant::with('types', 'dishes')->orderByDesc('id')->paginate(9);
        $types = Type::all();

        return response()->json([
            "success" => true,
            "response" => $allRestaurants,
            "types" => $types,
        ]);
    }

    public function getSingleRestaurant($id)
    {


        $restaurant = Restaurant::with('types', 'dishes')->where('id', $id)->first();

        if ($restaurant) {
            return response()->json([
                'success' => true,
                'response' => $restaurant
            ]);
        } else {
            return response()->json([
                'success' => false,
                'response' => 'Sorry nothing found!'
            ]);
        }
    }

    public function filteredType(Request $request)
    {
      //
    }
}
