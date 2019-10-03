<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    protected $table = 'paquetes';

    // protected $fillable=[
    //     "Nombre_Tienda",
    //     "Contrasena",
    //     "Encargado",
    //     "Pais",
    //     "Estado",
    //     "Colonia"
    // ];

    protected function CaracteristicasPaquete(){
        return $this->hasOne(Caracteristica_Paquete::class,'id');
    }

}
