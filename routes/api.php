<?php

use App\Paquete;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('/paquetes')->group(function () {
    Route::post('/', 'PaquetesController@PaquetesDisponibles');
    Route::post('/crear','PaquetesController@CrearPaquete');
    Route::post('/eliminar', 'PaquetesController@EliminarPaquete');
    Route::post('/columnas/{table}','PaquetesController@NombresColumnas');
});

Route::prefix('/eventos')->group(function () {
    Route::post('/', 'EventosController@ObtenerEventos');
    Route::post('/Añadir', 'EventosController@AgregarEvento');
    Route::post('/Eliminar', 'EventosController@EliminarEvento');
});

Route::prefix('/usuarios')->group(function () {
    Route::post('/', 'UsersController@Usuarios');
    Route::post('/Eliminar', 'UsersController@EliminarUsuario');
    Route::post('/Contraseña/Actualizar', 'UsersController@ActualizarContraseña');
});

Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {
        // Below mention routes are public, user can access those without any restriction.
        // Create New User
        Route::post('register', 'AuthController@register');
        // Login User
        Route::post('login', 'AuthController@login');

        // Refresh the JWT Token
        Route::get('refresh', 'AuthController@refresh');

        // Below mention routes are available only for the authenticated users.
        Route::middleware('auth:api')->group(function () {
            // Get user info
            Route::get('user', 'AuthController@user');
            // Logout user from application
            Route::post('logout', 'AuthController@logout');
        });
    });
});



