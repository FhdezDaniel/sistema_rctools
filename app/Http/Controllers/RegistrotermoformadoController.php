<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registrotermoformado;

class RegistrotermoformadoController extends Controller
{
    public function index()
    {
        $registrotermoformados = Registrotermoformado::all();
        return view('registrotermoformado.index')->with('registrotermoformados',$registrotermoformados);
    }

    public function create()
    {
        return view('registrotermoformado.create');
    }

    public function store(Request $request)
    {
        $registrotermoformados = new Registrotermoformado();

        $registrotermoformados->empleado_id = $request->get('empleado_id');
        $registrotermoformados->maquina = $request->get('maquina');
        $registrotermoformados->hora = $request->get('hora');
        $registrotermoformados->fecha = $request->get('fecha');
        $registrotermoformados->turno = $request->get('turno');
        $registrotermoformados->linea = $request->get('linea');
        $registrotermoformados->producto_id = $request->get('producto_id');
        $registrotermoformados->piezas_buenas = $request->get('piezas_buenas');
        $registrotermoformados->piezas_malas = $request->get('piezas_malas');
        $registrotermoformados->piezas_malas_nuevo = $request->get('piezas_malas_nuevo');
        $registrotermoformados->tiempo_muerto_operador = $request->get('tiempo_muerto_operador');
        $registrotermoformados->tiempo_muerto_mantenimiento = $request->get('tiempo_muerto_mantenimiento');
        $registrotermoformados->causa = $request->get('causa');
        $registrotermoformados->limpieza = $request->get('limpieza');

        $registrotermoformados->save();

        return redirect('/registrotermoformado');
    }

    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $registrotermoformado = Registrotermoformado::find($id);
        return view('registrotermoformado.edit')->with('registrotermoformado',$registrotermoformado);
    }

    public function update(Request $request, string $id)
    {
        $registrotermoformado = Registrotermoformado::find($id);

        $registrotermoformado->empleado_id = $request->get('empleado_id');
        $registrotermoformado->maquina = $request->get('maquina');
        $registrotermoformado->hora = $request->get('hora');
        $registrotermoformado->fecha = $request->get('fecha');
        $registrotermoformado->turno = $request->get('turno');
        $registrotermoformado->linea = $request->get('linea');
        $registrotermoformado->producto_id = $request->get('producto_id');
        $registrotermoformado->piezas_buenas = $request->get('piezas_buenas');
        $registrotermoformado->piezas_malas = $request->get('piezas_malas');
        $registrotermoformado->piezas_malas_nuevo = $request->get('piezas_malas_nuevo');
        $registrotermoformado->tiempo_muerto_operador = $request->get('tiempo_muerto_operador');
        $registrotermoformado->tiempo_muerto_mantenimiento = $request->get('tiempo_muerto_mantenimiento');
        $registrotermoformado->causa = $request->get('causa');
        $registrotermoformado->limpieza = $request->get('limpieza');

        $registrotermoformado->save();

        return redirect('/registrotermoformado');
    }

    
    public function destroy(string $id)
    {
        $registrotermoformado = Registrotermoformado::find($id);
        $registrotermoformado->delete();

        return redirect('/registrotermoformado');
    }
}
