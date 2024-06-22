<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $name = ['antonio', 'stanislav', 'emanuel', 'carlo', 'andrea'];

        $email = ['risto1@test.com', 'risto2@test.com', 'risto3@test.com', 'risto4@test.com', 'risto5@test.com'];

        for ($i = 0; $i < 5; $i++) {
            $newUser = new User();
            $newUser->name = $name[$i];
            $newUser->email = $email[$i];
            $newUser->password = bcrypt('password');
            $newUser->save();
        }
    }
}
