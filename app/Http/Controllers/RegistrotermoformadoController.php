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

        $registrotermoformados->nombreop = $request->get('nombreop');
        $registrotermoformados->maquina = $request->get('maquina');
        $registrotermoformados->fecha = $request->get('fecha');
        $registrotermoformados->turno = $request->get('turno');
        $registrotermoformados->producto = $request->get('producto');
        $registrotermoformados->pzsbuenas = $request->get('pzsbuenas');
        $registrotermoformados->pzsmalas = $request->get('pzsmalas');
        $registrotermoformados->pzasmalasnuevo = $request->get('pzasmalasnuevo');
        $registrotermoformados->tiempoop = $request->get('tiempoop');
        $registrotermoformados->tiempomtto = $request->get('tiempomtto');
        $registrotermoformados->causa = $request->get('causa');
        $registrotermoformados->limpieza = $request->get('limpieza');

        $registrotermoformados->save();

        return redirect('/registrotermoformado');
    }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $registrotermoformado = Registrotermoformado::find($id);
        return view('registrotermoformado.edit')->with('registrotermoformado',$registrotermoformado);
    }

    public function update(Request $request, string $id)
    {
        $registrotermoformado = Registrotermoformado::find($id);

        $registrotermoformado->nombreop = $request->get('nombreop');
        $registrotermoformado->maquina = $request->get('maquina');
        $registrotermoformado->fecha = $request->get('fecha');
        $registrotermoformado->turno = $request->get('turno');
        $registrotermoformado->producto = $request->get('producto');
        $registrotermoformado->pzsbuenas = $request->get('pzsbuenas');
        $registrotermoformado->pzsmalas = $request->get('pzsmalas');
        $registrotermoformado->pzasmalasnuevo = $request->get('pzasmalasnuevo');
        $registrotermoformado->tiempoop = $request->get('tiempoop');
        $registrotermoformado->tiempomtto = $request->get('tiempomtto');
        $registrotermoformado->causa = $request->get('causa');
        $registrotermoformado->limpieza = $request->get('limpieza');


        $registrotermoformado->save();

        return redirect('/registrotermoformado');
    }

    
    public function destroy(string $id)
    {
        $registrotermo = RegistroTermoformado::find($id);
        $registrotermo->delete();

        return redirect('/registrotermoformado');
    }
}
