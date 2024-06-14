<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;
use App\Models\Type;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $types = Type::all();

        for ($i = 0; $i < 5; $i++) {
            $restaurant = new Restaurant();
            $restaurant->name = $faker->words(4, true);
            $restaurant->slug = Str::of($restaurant->name)->slug('-');
            $restaurant->contact_email = $faker->safeEmail();
            $restaurant->vat = $faker->numerify('##########');
            $restaurant->address = $faker->address;
            $restaurant->phone_number = $faker->phoneNumber();
            $restaurant->user_id = $i + 1;
            $randomType = $types->random();
            $restaurant->type_id = $randomType->id;
            $restaurant->save();
        }
    }
}
