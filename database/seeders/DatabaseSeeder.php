<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\RestaurantSeeder;
use Database\Seeders\DishSeeder;
use Database\Seeders\UsersSeeder;
use Database\Seeders\TypeSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /* first create users and types for dependency reasons */
        $this->call([
            UsersSeeder::class,
            TypeSeeder::class
        ]);
        /* then */
        $this->call([
            RestaurantSeeder::class
        ]);
        $this->call([
            DishSeeder::class,
        ]);
    }
}
