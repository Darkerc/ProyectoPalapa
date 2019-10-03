<?php

namespace App\Http\Controllers;

use App\Caracteristica_Paquete;
use App\Http\Resources\PaquetesCollection;
use App\Paquete;
use Illuminate\Http\Request;

class PaquetesController extends Controller
{
    public function PaquetesDisponibles(){

        $paquetes = Paquete::all();

        foreach($paquetes as $paquete){
            $paquete->CaracteristicasPaquete;
        }
        return new PaquetesCollection($paquetes);
    }

    public function EliminarPaquete(Request $request){
        $idPaquete = $request->idPaquete;
        Paquete::destroy($idPaquete);

        return response()->json([
            'status' => 'success',
            'msg' => $idPaquete
        ], 200);
    }

    public function Pruebas(){
        // $paqueteSolicitado = Paquete::find(1);
        // $paqueteSolicitado->CaracteristicasPaquete;

        $paquetes = Paquete::all();

        foreach($paquetes as $paquete){
            $paquete->CaracteristicasPaquete;
        }

        return $paquetes;
    }
}
