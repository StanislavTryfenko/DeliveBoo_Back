<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Type;
use Illuminate\Support\Facades\DB;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::with('types', 'dishes')->orderByDesc('id')->paginate(9);
        $types = Type::all();

        return response()->json([
            "success" => true,
            "restaurants" => $restaurants,
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
        $lista = [2, 4, 5];
        $countLista = count($lista);
        /*
SELECT `name_restaurant`,`restaurants`.`id` FROM `restaurants`
JOIN `restaurant_type` ON `restaurants`.`id` = `restaurant_type`.`restaurant_id`
JOIN `types` ON `restaurant_type`.`type_id` = `types`.`id`
WHERE `types`.`id` IN (2,4,5)
GROUP BY `restaurants`.`id`
HAVING COUNT(`types`.`id`) = 3;
*/

        $query = DB::table('restaurants')
            ->select('restaurants.name_restaurant', 'restaurants.id')
            ->join('restaurant_type', 'restaurants.id', '=', 'restaurant_type.restaurant_id')
            ->join('types', 'restaurant_type.type_id', '=', 'types.id')
            ->whereIn('types.id', $lista)
            ->groupBy('restaurants.id')
            ->havingRaw('COUNT(types.id) = ?', [$countLista])
            ->get();

        return response()->json([
            'success' => true,
            'response' => $query,
            'lunghezza' => $countLista,
        ]);

    }
}
