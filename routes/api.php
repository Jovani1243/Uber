<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\personasController;
use App\Http\Controllers\tiendaController;
use App\Http\Controllers\vehiculosController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Tabla personas
//Busqueda de consultas en tablas
Route::get('/getpersona',[personasController::class,'getpersona']);
//Insertar registros de una tabla
Route::post('/insertar_persona',[personasController::class,'insertar']);
//Modifcar registros de una tabla
Route::post('/modificar_persona/{id}',[personasController::class,'modificar']);
//Eliminar un registro de una tabla
Route::post('/eliminar_persona/{id}',[personasController::class,'eliminar']);

//Tabla tienda
//Busqueda de consultas en tablas
Route::get('/gettienda',[tiendaController::class,'gettienda']);
//Insertar registros de una tabla
Route::post('/insertar_tienda',[tiendaController::class,'insertar']);
//Modifcar registros de una tabla
Route::post('/modificar_tienda/{id}',[tiendaController::class,'modificar']);
//Eliminar un registro de una tabla
Route::post('/eliminar_tienda/{id}',[tiendaController::class,'eliminar']);

//Tabla vehiculos
//Busqueda de consultas en tablas
Route::get('/getvehiculos',[vehiculosController::class,'getvheiculos']);
//Insertar registros de una tabla
Route::post('/insertar_vehiculo',[vehiculosController::class,'insertar']);
//Modifcar registros de una tabla
Route::post('/modificar_vehiculo/{id}',[vehiculosController::class,'modificar']);
//Eliminar un registro de una tabla
Route::post('/eliminar_vehiculo/{id}',[vehiculosController::class,'eliminar']);

//Guzzle es un cliente HTTP de PHP que facilita el envío de solicitudes HTTP y simplifica la integración con los servicios web.
use Illuminate\Support\Facades\Http;
Route::get('getData', function()
{
    $response = Http::get('https://jsonplaceholder.typicode.com/posts');
    $posts = json_decode($response->body());
    foreach($posts as $post)
    {
        echo $post->body;
        die();
    }
});

//JWT autenticacion registrar,logiarse y actorizar usuario.
Route::post('register', 'App\Http\Controllers\UserController@register');
Route::post('login', 'App\Http\Controllers\UserController@authenticate');

Route::group(['middleware' => ['jwt.verify']], function() {

    Route::post('user','App\Http\Controllers\UserController@getAuthenticatedUser');

});