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
        $user->name = "Eder R.C";
        $user->email = "ederastonmartin@hotmail.com";
        $user->password = bcrypt("contraseñaSegura");
        $user->save();

    }
}
