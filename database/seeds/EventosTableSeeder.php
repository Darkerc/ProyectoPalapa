<?php

use App\Evento;
use Illuminate\Database\Seeder;

class EventosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $evento = new Evento();
        $evento->Nombre_del_evento="Fiesta infantil";
        $evento->Arrendatario="La Nayanci";
        $evento->Fecha_De_Inicio="2019-10-22";
        $evento->Anticipo=0;
        $evento->Horas_Extra="03:00";
        $evento->Paquetes_Id=1;
        $evento->save();

        $evento = new Evento();
        $evento->Nombre_del_evento="Concierto musical";
        $evento->Arrendatario="El solAno";
        $evento->Fecha_De_Inicio="2019-10-25";
        $evento->Anticipo=1;
        $evento->Horas_Extra="00:00";
        $evento->Paquetes_Id=3;
        $evento->save();
    }
}
