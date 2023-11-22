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

        $registroempaquetados->nombreop = $request->get('nombreop');
        $registroempaquetados->maquina = $request->get('maquina');
        $registroempaquetados->fecha = $request->get('fecha');
        $registroempaquetados->turno = $request->get('turno');
        $registroempaquetados->producto = $request->get('producto');
        $registroempaquetados->cajasrechazadas = $request->get('cajasrechazadas');
        $registroempaquetados->totalcajas = $request->get('totalcajas');
        $registroempaquetados->observaciones = $request->get('observaciones');
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

        $registroempaquetado->nombreop = $request->get('nombreop');
        $registroempaquetado->maquina = $request->get('maquina');
        $registroempaquetado->fecha = $request->get('fecha');
        $registroempaquetado->turno = $request->get('turno');
        $registroempaquetado->producto = $request->get('producto');
        $registroempaquetado->cajasrechazadas = $request->get('cajasrechazadas');
        $registroempaquetado->totalcajas = $request->get('totalcajas');
        $registroempaquetado->observaciones = $request->get('observaciones');
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
