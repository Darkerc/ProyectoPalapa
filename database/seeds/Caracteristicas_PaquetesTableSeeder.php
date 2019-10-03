<?php

use App\Caracteristica_Paquete;
use Illuminate\Database\Seeder;

class Caracteristicas_PaquetesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paqueteSemilla = new Caracteristica_Paquete();

        $paqueteSemilla->Mesas = 10;
        $paqueteSemilla->Mesas_Adicionales = 2;
        $paqueteSemilla->Juegos_De_Feria = 0;
        $paqueteSemilla->Duracion_Del_Evento = time() + (0 * 7 * 0 * 0);
        $paqueteSemilla->Organizacion_Evento = time() + (0 * 3 * 0 * 0);
        $paqueteSemilla->Evento_Nocturno = false;
        $paqueteSemilla->Manteleria = true;
        $paqueteSemilla->Bocinas_Bluetooth = true;
        $paqueteSemilla->Camara_De_Luces = true;
        $paqueteSemilla->Ayudante = false;
        $paqueteSemilla->Inflable = false;
        $paqueteSemilla->Piñata = false;
        $paqueteSemilla->Pastel_Oblea = false;

        $paqueteSemilla->save();


        $paqueteSemilla = new Caracteristica_Paquete();

        $paqueteSemilla->Mesas = 10;
        $paqueteSemilla->Mesas_Adicionales = 2;
        $paqueteSemilla->Juegos_De_Feria = 4;
        $paqueteSemilla->Duracion_Del_Evento = time();
        $paqueteSemilla->Organizacion_Evento = time();
        $paqueteSemilla->Evento_Nocturno = false;
        $paqueteSemilla->Manteleria = true;
        $paqueteSemilla->Bocinas_Bluetooth = true;
        $paqueteSemilla->Camara_De_Luces = true;
        $paqueteSemilla->Ayudante = true;
        $paqueteSemilla->Inflable = true;
        $paqueteSemilla->Piñata = false;
        $paqueteSemilla->Pastel_Oblea = false;

        $paqueteSemilla->save();



        $paqueteSemilla = new Caracteristica_Paquete();

        $paqueteSemilla->Mesas = 10;
        $paqueteSemilla->Mesas_Adicionales = 2;
        $paqueteSemilla->Juegos_De_Feria = 0;
        $paqueteSemilla->Duracion_Del_Evento = time() + (0 * 7 * 0 * 0);
        $paqueteSemilla->Organizacion_Evento = time() + (0 * 3 * 0 * 0);
        $paqueteSemilla->Evento_Nocturno = false;
        $paqueteSemilla->Manteleria = true;
        $paqueteSemilla->Bocinas_Bluetooth = true;
        $paqueteSemilla->Camara_De_Luces = true;
        $paqueteSemilla->Ayudante = true;
        $paqueteSemilla->Inflable = true;
        $paqueteSemilla->Piñata = true;
        $paqueteSemilla->Pastel_Oblea = true;

        $paqueteSemilla->save();
    }
}
