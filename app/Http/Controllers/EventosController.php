<?php

namespace App\Http\Controllers;

use App\Evento;
use App\Paquete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventosController extends Controller
{
    public function ObtenerEventos(){
        return Evento::all();
    }

    public function AgregarEvento(Request $request){
        $datosFormulario = $request->except(['Nombre_Paquete']);

        $Nombre_Paquete = $request->only('Nombre_Paquete');

        $paqueteSeleccionado = Paquete::where('NombrePaquete',$Nombre_Paquete['Nombre_Paquete'])->first();

        $datosFormulario['Paquetes_Id'] = $paqueteSeleccionado->id;

        $eventoId=DB::table('eventos')->insertGetId($datosFormulario);

        return response(Evento::findOrFail($eventoId), 200);
    }

    public function EliminarEvento(Request $request){
        $evento = Evento::find($request['id']);
        $evento->delete();
        return response('Evento eliminado', 200);
    }
}
