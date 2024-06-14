<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\RestaurantSeeder;
use Database\Seeders\DishSeeder;
use Database\Seeders\UsersSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /* first create users */
        $this->call([
            UsersSeeder::class
        ]);
        /* then consider restaurant dependency on user */
        $this->call([
            DishSeeder::class,
            RestaurantSeeder::class
        ]);
    }
}
