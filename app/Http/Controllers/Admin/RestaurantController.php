<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.dashboard');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.dashboard');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRestaurantRequest $request)
    {

        $validated = $request->validated();

        $slug = Str::slug($request->title, '-');
        $validated['slug'] = $slug;

        if ($request->has('logo')) {
            $logo = Storage::put('uploads', $validated['logo']);
            $validated['logo'] = $logo;
        }

        if ($request->has('thumb')) {
            $thumb = Storage::put('uploads', $validated['thumb']);
            $validated['thumb'] = $thumb;
        }

        $restaurant = Restaurant::create($validated);
        return to_route('admin.dashboard')->with('message', 'Restaurant added with Success!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant)
    {

        return view('admin.dashboard', compact('restaurant'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurant $restaurant)
    {
        return view('admin.dashboard', compact('restaurant'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {

        $validated = $request->validated();

        $slug = Str::slug($request->title, '-');
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

        $restaurant->update($validated);
        return to_route('admin.dashboard', $restaurant)->with('message', "Your $restaurant->title Updated");

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
        return to_route('admin.dashboard')->with('message', "Your $restaurant->title deleted");
    }
}
