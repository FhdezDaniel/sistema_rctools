<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registroinspeccionbarrenado;

class RegistroinspeccionbarrenadoController extends Controller
{
    public function index()
    {
        $registroinspeccionbarrenados = Registroinspeccionbarrenado::all();
        return view('registroinspeccionbarrenado.index')->with('registroinspeccionbarrenados',$registroinspeccionbarrenados);
    }

    public function create()
    {
        return view('registroinspeccionbarrenado.create');
    }

    public function store(Request $request)
    {
        $registroinspeccionbarrenados = new Registroinspeccionbarrenado();

        $registroinspeccionbarrenados->empleado_id = $request->get('empleado_id');
        $registroinspeccionbarrenados->maquina = $request->get('maquina');
        $registroinspeccionbarrenados->hora = $request->get('hora');
        $registroinspeccionbarrenados->fecha = $request->get('fecha');
        $registroinspeccionbarrenados->turno = $request->get('turno');
        $registroinspeccionbarrenados->linea = $request->get('linea');
        $registroinspeccionbarrenados->producto_id = $request->get('producto_id');
        $registroinspeccionbarrenados->total_piezas = $request->get('total_piezas');
        $registroinspeccionbarrenados->piezas_malas = $request->get('piezas_malas');
        $registroinspeccionbarrenados->tiempo_muerto_operador = $request->get('tiempo_muerto_operador');
        $registroinspeccionbarrenados->causa = $request->get('causa');
        $registroinspeccionbarrenados->limpieza = $request->get('limpieza');

        $registroinspeccionbarrenados->save();

        return redirect('/registroinspeccionbarrenado');
    }

    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $registroinspeccionbarrenado = Registroinspeccionbarrenado::find($id);
        return view('registroinspeccionbarrenado.edit')->with('registroinspeccionbarrenado',$registroinspeccionbarrenado);
    }

    public function update(Request $request, string $id)
    {
        $registroinspeccionbarrenado = Registroinspeccionbarrenado::find($id);

        $registroinspeccionbarrenado->empleado_id = $request->get('empleado_id');
        $registroinspeccionbarrenado->maquina = $request->get('maquina');
        $registroinspeccionbarrenado->hora = $request->get('hora');
        $registroinspeccionbarrenado->fecha = $request->get('fecha');
        $registroinspeccionbarrenado->turno = $request->get('turno');
        $registroinspeccionbarrenado->linea = $request->get('linea');
        $registroinspeccionbarrenado->producto_id = $request->get('producto_id');
        $registroinspeccionbarrenado->total_piezas = $request->get('total_piezas');
        $registroinspeccionbarrenado->piezas_malas = $request->get('piezas_malas');
        $registroinspeccionbarrenado->tiempo_muerto_operador = $request->get('tiempo_muerto_operador');
        $registroinspeccionbarrenado->causa = $request->get('causa');
        $registroinspeccionbarrenado->limpieza = $request->get('limpieza');

        $registroinspeccionbarrenado->save();

        return redirect('/registroinspeccionbarrenado');
    }

    
    public function destroy(string $id)
    {
        $registroinspeccionbarrenado = Registroinspeccionbarrenado::find($id);
        $registroinspeccionbarrenado->delete();

        return redirect('/registroinspeccionbarrenado');
    }
}
