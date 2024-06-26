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
        $types = Type::all();

        for ($i = 0; $i < 5; $i++) {
            $restaurant = new Restaurant();
            $restaurant->name_restaurant = $faker->words(4, true);
            $restaurant->slug = Str::of($restaurant->name_restaurant)->slug('-');
            $restaurant->contact_email = $faker->safeEmail();
            $restaurant->vat = $faker->numerify('###########');
            $restaurant->address = $faker->address;
            $restaurant->phone_number = $faker->numerify('##########');
            $restaurant->user_id = $i + 1;
            $restaurant->save();
        }

        $types_array = range(1, 6);

        foreach (Restaurant::all() as $restaurant) {
            $restaurant->types()->attach($faker->randomElements($types_array, null));
        }

        $restaurants = [
            ['name' => 'Da Vinci\'s Table', 'address' => '5678 Piazza del Popolo, Firenze, Italia', 'mail' => '', 'phone_number' => '', 'vat' => '', 'thumb' => 'uploads\da-vinci.jpg'],

            ['name' => 'L\'Italiano Gourmet', 'address' => '321 Via Giuseppe Verdi, Milano, Italia', 'mail' => '', 'phone_number' => '', 'vat' => '', 'thumb' => 'uploads\ristorante-gourmet.jpg'],

            ['name' => 'Osteria del Sole', 'address' => '456 Corso Vittorio Emanuele II, Napoli, Italia', 'mail' => '', 'phone_number' => '', 'vat' => '', 'thumb' => 'uploads\osteria-del-sole.jpg'],

            ['name' => 'Flavors of Italy', 'address' => '987 Via Santa Croce, Venezia, Italia', 'mail' => '', 'phone_number' => '', 'vat' => '', 'thumb' => 'uploads\flavors-of-italy.jpg'],

            ['name' => 'Il Giardino d\'Italia', 'address' => '1234 Via della Stella, Roma, Italia', 'mail' => '', 'phone_number' => '', 'vat' => '', 'thumb' => 'uploads\ristorante-giardino.jpg'],
        ];


        // $restaurants = Restaurant::all();

        // foreach ($types as $type) {
        //     foreach ($restaurants as $restaurant) {
        //         $restaurant = new Restaurant();
        //         $restaurant->type_id = $type->id;
        //         $restaurant->name = $restaurantData['name'];
        //         $restaurant->slug = Str::of($restaurant->name_restaurant)->slug('-');
        //         $restaurant->address = $restaurantData['address'];
        //         $restaurant->contact_email = $faker->safeEmail();
        //         $restaurant->phone_number = $faker->numerify('##########');
        //         $restaurant->vat = $faker->numerify('###########');
        //         $restaurant->logo = $restaurantData['logo'];
        //         $restaurant->save();
        //     }
        // }
    }
}
