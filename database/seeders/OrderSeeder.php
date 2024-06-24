<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Restaurant;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $orders = [
            ['name' => 'Antonio', 'lastname' => 'Di Francesco'],
            ['name' => 'Francesco', 'lastname' => 'Sabino'],
            ['name' => 'Michele', 'lastname' => 'Maggiore'],
            ['name' => 'Luca', 'lastname' => 'Bianchi'],
            ['name' => 'Giulia', 'lastname' => 'Rossi'],
            ['name' => 'Marco', 'lastname' => 'Verdi'],
            ['name' => 'Anna', 'lastname' => 'Neri'],
            ['name' => 'Paolo', 'lastname' => 'Gialli'],
            ['name' => 'Giorgio', 'lastname' => 'Russo'],
            ['name' => 'Laura', 'lastname' => 'Bianco'],
        ];
        //recupero tutte le istanze dei ristoranti
        $restaurants = Restaurant::all();

        foreach ($restaurants as $restaurant) {
            foreach ($orders as $orderData) {
                $order = new Order();
                $order->restaurant_id = $restaurant->id;
                $order->customer_name = $orderData['name'];
                $order->customer_lastname = $orderData['lastname'];
                $order->customer_phone_number = $faker->phoneNumber;
                $order->customer_address = $faker->streetAddress;
                $order->customer_email = $faker->safeEmail;
                $order->total_price = $faker->randomFloat($nbMaxDecimals = 3, $min = 0, $max = 9999.99);
                $order->date = $faker->dateTimeThisCentury()->format('Y-m-d H:i:s');
                //manca status perchè viene messo di default
                $order->save();
            }
        }

    }
}
