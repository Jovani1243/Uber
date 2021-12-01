<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tienda;

class tiendaController extends Controller
{
    public function gettienda(){
        //sirve para retornar datos con all
        return tienda::all();
    }

    public function insertar(Request $request)
    {
        // Validate the request...

        //dd($request->nombre);

        $personas = tienda::create([
            'id' => $request->id,
            'nombre_vehiculo' => $request->nombre_vehiculo,
            'precio' => $request->precio,
            'vehiculo' => $request->vehiculo,
        ]);

        return $personas;
    }

    public function modificar(Request $request ,$id){
        $personas= tienda::find($id);

        $personas->precio = $request->precio;

        $personas->save();

        return $personas;
    }

    public function eliminar($id){
        $personas = tienda::find($id);

        $personas->delete();

        return $personas;
    }
}
