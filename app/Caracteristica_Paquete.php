<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caracteristica_Paquete extends Model
{
    protected $table = "caracteristicas_paquetes";

    protected function CaracteristicasPaquete(){
        return $this->belongsTo(Paquete::class,"Caracteristicas_Id");
    }
}
