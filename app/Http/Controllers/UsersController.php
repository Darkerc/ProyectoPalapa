<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function Usuarios(){
        return User::all();
    }

    public function EliminarUsuario(Request $request){
        $usuario = User::find($request['id']);
        if($usuario->id == 1 || $usuario->id == 2){
            return response("Eliminacion no permitida",500);
        }else{
            $usuario->delete();
            return response("Hecho", 200);
        }
    }
}

