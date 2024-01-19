<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistroDeTermoformado;

class RegistroDeTermoformadosController extends Controller
{
    public function index()
    {
        $registrodetermoformados = RegistroDeTermoformado::all();
        return view('registrodetermoformado.index')->with('registrodetermoformados',$registrodetermoformados);
    }

    public function create()
    {
        return view('registrodetermoformado.create');
    }

    public function store(Request $request)
    {
        $registrodetermoformados = new RegistroDeTermoformado();

        $registrodetermoformados->empleado_id = $request->get('empleado_id');
        $registrodetermoformados->nombreop = $request->get('nombreop');
        $registrodetermoformados->maquina = $request->get('maquina');
        $registrodetermoformados->fecha = $request->get('fecha');
        $registrodetermoformados->turno = $request->get('turno');
        $registrodetermoformados->producto = $request->get('producto');
        $registrodetermoformados->pzsbuenas = $request->get('pzsbuenas');
        $registrodetermoformados->pzsmalas = $request->get('pzsmalas');
        $registrodetermoformados->pzasmalasnuevo = $request->get('pzasmalasnuevo');
        $registrodetermoformados->tiempoop = $request->get('tiempoop');
        $registrodetermoformados->tiempomtto = $request->get('tiempomtto');
        $registrodetermoformados->causa = $request->get('causa');
        $registrodetermoformados->limpieza = $request->get('limpieza');

        $registrodetermoformados->save();

        return redirect('/registrodetermoformado');
    }

    public function show(string $id)
    {
        //
    }

    
    public function edit(string $id)
    {
        $registrdetermoformado = RegistroDeTermoformado::find($id);
        return view('registrodetermoformado.edit')->with('registrodetermoformado',$registrodetermoformado);
    }

    public function update(Request $request, string $id)
    {
        $registrodetermoformado = RegistroDeTermoformado::find($id);

        $registrodetermoformado->empleado_id = $request->get('empleado_id');
        $registrodetermoformado->nombreop = $request->get('nombreop');
        $registrodetermoformado->maquina = $request->get('maquina');
        $registrodetermoformado->fecha = $request->get('fecha');
        $registrodetermoformado->turno = $request->get('turno');
        $registrodetermoformado->producto = $request->get('producto');
        $registrodetermoformado->pzsbuenas = $request->get('pzsbuenas');
        $registrodetermoformado->pzsmalas = $request->get('pzsmalas');
        $registrodetermoformado->pzasmalasnuevo = $request->get('pzasmalasnuevo');
        $registrodetermoformado->tiempoop = $request->get('tiempoop');
        $registrodetermoformado->tiempomtto = $request->get('tiempomtto');
        $registrodetermoformado->causa = $request->get('causa');
        $registrodetermoformado->limpieza = $request->get('limpieza');
        
        $registrodetermoformado->save();

        return redirect('/registrodetermoformado');
    }

    
    public function destroy(string $id)
    {
        $registrotermo = RegistroDeTermoformado::find($id);
        $registrotermo->delete();

        return redirect('/registrodetermoformado');
    }
}
