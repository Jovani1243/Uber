<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\personas;

class personasController extends Controller
{
    public function getpersona(){
        //sirve para retornar datos con all
        return personas::all();
    }

    public function insertar(Request $request)
    {
        // Validate the request...

        //dd($request->nombre);

        $personas = personas::create([
            'id' => $request->id,
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'tienda' => $request->tienda,
        ]);

        return $personas;
    }

    public function modificar(Request $request ,$id){
        $personas= personas::find($id);

        $personas->correo = $request->correo;

        $personas->save();

        return $personas;
    }

    public function eliminar($id){
        $personas = personas::find($id);

        $personas->delete();

        return $personas;
    }
}
