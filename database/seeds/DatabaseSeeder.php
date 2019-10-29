<?php
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PaquetesTableSeeder::class,
            Caracteristicas_PaquetesTableSeeder::class,
            UsersTableSeeder::class,
            EventosTableSeeder::class
        ]);
    }
}
