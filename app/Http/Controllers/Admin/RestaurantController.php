<?php

namespace App\Http\Controllers\Admin;

use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Type;
use Illuminate\Support\Facades\Gate;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::id();
        $user = User::find($user_id);
        $restaurant = $user->restaurant;
        $typeList = Type::all();

        return view('admin.restaurants.index', compact('restaurant', 'typeList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRestaurantRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant)
    {

        return view('dashboard', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurant $restaurant)
    {
        if (!Gate::allows('update-restaurant', $restaurant)) {
            abort(403, "Non autorizzato");
        }
        $typeList = Type::all();
        return view('admin.restaurants.edit', compact('restaurant', 'typeList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        /*
        if (Gate::allows('update-restaurant', $restaurant)) {
            //dd($request->all());
            $validated = $request->validated();

            $slug = Str::slug($request->name, '-');
            $validated['slug'] = $slug;

            if ($request->has('logo')) {
                if ($restaurant->logo) {
                    Storage::delete($restaurant->logo);
                }

                $logo = Storage::put('uploads', $validated['logo']);
                $validated['logo'] = $logo;
            }

            if ($request->has('thumb')) {
                if ($restaurant->thumb) {
                    Storage::delete($restaurant->thumb);
                }

                $thumb = Storage::put('uploads', $validated['thumb']);
                $validated['thumb'] = $thumb;
            }

            if ($request->has('typeList')) {

                $restaurant->types()->sync($validated['typeList']);
            } else {
                $restaurant->types()->sync([]);
            }

            //dd($validated);
            $restaurant->update($validated);


            return to_route('admin.restaurants.index', $restaurant)->with('message', "Il Ristorante: $restaurant->title è stato aggiornato");
        }
        abort(403, "Non cercare di modificare il ristorante di un altro");
        */
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant)
    {

        if ($restaurant->logo) {
            Storage::delete($restaurant->logo);
        }
        if ($restaurant->thumb) {
            Storage::delete($restaurant->thumb);
        }

        $restaurant->delete();
        return to_route('dashboard')->with('message', "Your $restaurant->title deleted");
    }

    
}
