<?php

use App\Paquete;
use Illuminate\Database\Seeder;

class PaquetesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paqueteSemilla = new Paquete();

        $paqueteSemilla->NombrePaquete = "Paquete Basico";
        $paqueteSemilla->Precio = 4000;
        $paqueteSemilla->URLImagen = "/images/ImgPaquetes/Image1.jpeg";
        $paqueteSemilla->Color = "pink darken-1";
        $paqueteSemilla->Caracteristicas_Id = 1;

        $paqueteSemilla->save();

        //=========================================================================

        $paqueteSemilla = new Paquete();

        $paqueteSemilla->NombrePaquete = "Paquetemociones";
        $paqueteSemilla->Precio = 6700;
        $paqueteSemilla->URLImagen = "/images/ImgPaquetes/Image2.jpeg";
        $paqueteSemilla->Color = "green darken-1";
        $paqueteSemilla->Caracteristicas_Id = 2;

        $paqueteSemilla->save();

        //=========================================================================

        $paqueteSemilla = new Paquete();

        $paqueteSemilla->NombrePaquete = "Paquetenfiestes";
        $paqueteSemilla->Precio = 8500;
        $paqueteSemilla->URLImagen = "/images/ImgPaquetes/Image3.jpeg";
        $paqueteSemilla->Color = "red darken-1";
        $paqueteSemilla->Caracteristicas_Id = 3;

        $paqueteSemilla->save();
    }
}
