<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'eventos';
    protected $guarded = [];

    protected function CaracteristicasPaquete(){
        return $this->hasOne(Paquete::class,"id");
    }
}
