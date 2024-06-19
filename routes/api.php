<?php

use App\Http\Controllers\API\RestaurantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//restituisce tutti i ristoranti
Route::get('/restaurants',[RestaurantController::class,'getAllRestaurants']);


//restituisce il menù del singolo ristorante



//restituisce la query con tutte le tipologie di ristorante filtrati