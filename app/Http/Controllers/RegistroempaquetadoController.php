<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registroempaquetado;

class RegistroempaquetadoController extends Controller
{
    public function index()
    {
        $registroempaquetados = Registroempaquetado::all();
        return view('registroempaquetado.index')->with('registroempaquetados',$registroempaquetados);
    }

    public function create()
    {
        return view('registroempaquetado.create');
    }

    public function store(Request $request)
    {
        $registroempaquetados = new Registroempaquetado();

        $registroempaquetados->empleado_id = $request->get('empleado_id');
        $registroempaquetados->maquina = $request->get('maquina');
        $registroempaquetados->hora = $request->get('hora');
        $registroempaquetados->fecha = $request->get('fecha');
        $registroempaquetados->turno = $request->get('turno');
        $registroempaquetados->linea = $request->get('linea');
        $registroempaquetados->producto = $request->get('producto');
        $registroempaquetados->cajas_rechazadas = $request->get('cajas_rechazadas');
        $registroempaquetados->total_cajas = $request->get('total_cajas');
        $registroempaquetados->tiempo_muerto_operador = $request->get('tiempo_muerto_operador');
        $registroempaquetados->causa = $request->get('causa');
        $registroempaquetados->limpieza = $request->get('limpieza');

        $registroempaquetados->save();

        return redirect('/registroempaquetado');
    }

    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $registroempaquetado = Registroempaquetado::find($id);
        return view('registroempaquetado.edit')->with('registroempaquetado',$registroempaquetado);
    }

    public function update(Request $request, string $id)
    {
        $registroempaquetado = Registroempaquetado::find($id);

        $registroempaquetado->empleado_id = $request->get('empleado_id');
        $registroempaquetado->maquina = $request->get('maquina');
        $registroempaquetado->hora = $request->get('hora');
        $registroempaquetado->fecha = $request->get('fecha');
        $registroempaquetado->turno = $request->get('turno');
        $registroempaquetado->linea = $request->get('linea');
        $registroempaquetado->producto = $request->get('producto');
        $registroempaquetado->cajas_rechazadas = $request->get('cajas_rechazadas');
        $registroempaquetado->total_cajas = $request->get('total_cajas');
        $registroempaquetado->tiempo_muerto_operador = $request->get('tiempo_muerto_operador');
        $registroempaquetado->causa = $request->get('causa');
        $registroempaquetado->limpieza = $request->get('limpieza');

        $registroempaquetado->save();

        return redirect('/registroempaquetado');
    }

    
    public function destroy(string $id)
    {
        $registroempaquetado = Registroempaquetado::find($id);
        $registroempaquetado->delete();

        return redirect('/registroempaquetado');
    }
}
