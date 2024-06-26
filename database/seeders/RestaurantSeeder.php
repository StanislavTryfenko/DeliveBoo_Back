<?php

namespace Database\Seeders;


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
        $restaurants = [
            ['name' => 'Da Vinci\'s Table', 'address' => '5678 Piazza del Popolo, Firenze, Italia', 'thumb' => 'uploads/da-vinci.jpg'],

            ['name' => 'L\'Italiano Gourmet', 'address' => '321 Via Giuseppe Verdi, Milano, Italia', 'thumb' => 'uploads/ristorante-gourmet.jpg'],

            ['name' => 'Osteria del Sole', 'address' => '456 Corso Vittorio Emanuele II, Napoli, Italia', 'thumb' => 'uploads/osteria-del-sole.jpg'],

            ['name' => 'Flavors of Italy', 'address' => '987 Via Santa Croce, Venezia, Italia', 'thumb' => 'uploads/flavors-of-italy.jpg'],

            ['name' => 'Il Giardino d\'Italia', 'address' => '1234 Via della Stella, Roma, Italia', 'thumb' => 'uploads/ristorante-giardino.jpg'],
        ];

        for ($i = 0; $i < count($restaurants); $i++) {
            $restaurant = new Restaurant();
            $restaurant->name_restaurant = $restaurants[$i]['name'];
            $restaurant->slug = Str::of($restaurant->name_restaurant)->slug('-');
            $restaurant->contact_email = $faker->safeEmail();
            $restaurant->vat = $faker->numerify('###########');
            $restaurant->address = $restaurants[$i]['address'];
            $restaurant->thumb = $restaurants[$i]['thumb'];
            $restaurant->phone_number = $faker->numerify('##########');
            $restaurant->user_id = $i + 1;
            $restaurant->save();
        }

        $types_array = range(1, 6);

        foreach (Restaurant::all() as $restaurant) {
            $restaurant->types()->attach($faker->randomElements($types_array, null));
        }
    }
}
