<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dish;
use App\Models\Restaurant;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $dishes = [
            ['name' => 'Pizza Margherita', 'price' => 8.50],
            ['name' => 'Spaghetti alla Carbonara', 'price' => 12.75],
            ['name' => 'Insalata Caprese', 'price' => 9.25],
            ['name' => 'Lasagna alla Bolognese', 'price' => 14.99],
            ['name' => 'Filetto di Salmone', 'price' => 18.50],
            ['name' => 'Bistecca Fiorentina', 'price' => 25.00],
            ['name' => 'Risotto ai Funghi Porcini', 'price' => 16.50],
            ['name' => 'Tortellini in Brodo', 'price' => 10.99],
            ['name' => 'Gnocchi al Pesto', 'price' => 11.25],
            ['name' => 'Tiramisù', 'price' => 7.99],
        ];

        $restaurants = Restaurant::all();

        foreach ($restaurants as $restaurant) {
            foreach ($dishes as $dishData) {
                $dish = new Dish();
                $dish->restaurant_id = $restaurant->id;
                $dish->name = $dishData['name'];
                $dish->price = $dishData['price'];
                $dish->slug = Str::of($dish->name)->slug('-');
                $dish->description = $faker->text(100);
                $dish->visible = true;
                $dish->save();
            }
        }
    }
}
