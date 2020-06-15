<?php

namespace App\Http\Controllers;

use App\Caracteristica_Paquete;
use App\Http\Resources\PaquetesCollection;
use App\Paquete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PaquetesController extends Controller
{
    public function PaquetesDisponibles(){

        $paquetes = Paquete::all();

        foreach($paquetes as $paquete){
            $paquete->CaracteristicasPaquete;
        }
        return $paquetes;
    }

    public function CrearPaquete(Request $request){
        $datosCPaquete = $request->only('Mesas','Mesas_Adicionales','Juegos_De_Feria','Duracion_Del_Evento',
                                        'Organizacion_Evento','Evento_Nocturno','Manteleria','Bocinas_Bluetooth',
                                        'Camara_De_Luces','Ayudante','Inflable','Piñata','Pastel_Oblea');
        $idCPaquetes = DB::table('caracteristicas_paquetes')->insertGetId($datosCPaquete);

        $datosPaquete = $request->only('NombrePaquete','Precio','URLImagen','Color');
        $datosPaquete['Caracteristicas_Id'] = $idCPaquetes;
        if($archivo=$request->file('URLImagen')){

            $contador=1;
            $nombre="Image" . $contador . "." .$archivo->getClientOriginalExtension();
            $url='images/ImgPaquetes/' . $nombre;

            //Verificando si exite la ruta y modificandola para crear un nuevo nombre a la imagen
            while (is_file($url)) {
                $contador++;
                //Nombre de la imagen que se ha seleccionado para en el formulario para guardar
                $nombre="Image" . $contador . "." .$archivo->getClientOriginalExtension();
                $url='images/ImgPaquetes/' . $nombre;
            }

            //Mueve la imagen al directorio 'images' y le asigna un nombre que es el de la propia imagen
            $archivo->move('images/ImgPaquetes/',$nombre);

            //Asignandole la ruta de la imagen a la variable entrada
            $datosPaquete['URLImagen']=$url;
        }
        $idPaquetes = DB::table('paquetes')->insertGetId($datosPaquete);

        return response()->json([
            'status' => 'success',
            'msg' => $idPaquetes
        ], 200);
    }

    public function EliminarPaquete(Request $request){
        $paquete = Paquete::find($request->idPaquete);
        Caracteristica_Paquete::destroy($paquete->Caracteristicas_Id);
        $urlImage=$_SERVER['DOCUMENT_ROOT'] . "/" .$paquete->URLImagen;
        unlink($urlImage);
        Paquete::destroy($paquete->id);
        return response()->json([
            'status' => 'success',
            'msg' => $urlImage
        ], 200);
    }

    public function Pruebas(){
        $paquetes = Paquete::all();

        foreach($paquetes as $paquete){
            $paquete->CaracteristicasPaquete;
        }

        return $paquetes;
    }

    public function NombresColumnas($table){

        $columnasTabla = Schema::getColumnListing($table);
        $columnas_tipos=[];
        $contador=0;

        foreach($columnasTabla as $columna){
            $columnas_tipos[$contador] = [$columna, Schema::getColumnType($table, $columna)];
            $contador++;
        }

        return $columnas_tipos;
    }
}
