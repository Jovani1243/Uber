<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vehiculos;

class vehiculosController extends Controller
{
    public function getvheiculos(){
        //sirve para retornar datos con all
        return vehiculos::all();
    }

    public function insertar(Request $request)
    {
        // Validate the request...

        //dd($request->nombre);

        $personas = vehiculos::create([
            'id' => $request->id,
            'modelo_vehiculo' => $request->modelo_vehiculo, 
            'marca_vehiculo' => $request->marca_vehiculo,
            'año_vehiculo' => $request->año_vehiculo,
        ]);

        return $personas;
    }

    public function modificar(Request $request ,$id){
        $personas= vehiculos::find($id);

        $personas->año_vehiculo = $request->año_vehiculo;

        $personas->save();

        return $personas;
    }

    public function eliminar($id){
        $personas = vehiculos::find($id);

        $personas->delete();

        return $personas;
    }
}
