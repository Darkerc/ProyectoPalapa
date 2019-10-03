<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaracteristicasPaquetesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caracteristicas_paquetes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer("Mesas");
            $table->integer("Mesas_Adicionales");
            $table->integer("Juegos_De_Feria");
            $table->time("Duracion_Del_Evento");
            $table->time("Organizacion_Evento");
            $table->boolean("Evento_Nocturno");
            $table->boolean("Manteleria");
            $table->boolean("Bocinas_Bluetooth");
            $table->boolean("Camara_De_Luces");
            $table->boolean("Ayudante");
            $table->boolean("Inflable");
            $table->boolean("Piñata");
            $table->boolean("Pastel_Oblea");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caracteristicas_paquetes');
    }
}
