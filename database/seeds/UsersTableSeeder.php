<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "Gabriela Garcia Hernandez";
        $user->email = "taku_ayume@hotmail.com";
        $user->password = bcrypt("PalapaQ2000");
        $user->save();

        $user = new User();
        $user->name = "Emmanuel Palma";
        $user->email = "aero999@outlook.es";
        $user->password = bcrypt("asdfgh123");
        $user->save();
    }
}
