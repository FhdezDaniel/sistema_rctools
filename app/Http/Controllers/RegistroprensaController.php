<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registroprensa;

class RegistroprensaController extends Controller
{
    public function index()
    {
        $registroprensas = Registroprensa::all();
        return view('registroprensa.index')->with('registroprensas',$registroprensas);
    }

    public function create()
    {
        return view('registroprensa.create');
    }

    public function store(Request $request)
    {
        $registroprensas = new Registroprensa();

        $registroprensas->nombreop = $request->get('nombreop');
        $registroprensas->maquina = $request->get('maquina');
        $registroprensas->fecha = $request->get('fecha');
        $registroprensas->turno = $request->get('turno');
        $registroprensas->producto = $request->get('producto');
        $registroprensas->pzsbuenas = $request->get('pzsbuenas');
        $registroprensas->pzsmalas = $request->get('pzsmalas');
        $registroprensas->tiempoop = $request->get('tiempoop');
        $registroprensas->tiempomtto = $request->get('tiempomtto');
        $registroprensas->observaciones = $request->get('observaciones');
        $registroprensas->limpieza = $request->get('limpieza');

        $registroprensas->save();

        return redirect('/registroprensa');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $registroprensa = Registroprensa::find($id);
        return view('registroprensa.edit')->with('registroprensa',$registroprensa);
    }


    public function update(Request $request, string $id)
    {
        $registroprensa = Registroprensa::find($id);

        $registroprensa->nombreop = $request->get('nombreop');
        $registroprensa->maquina = $request->get('maquina');
        $registroprensa->fecha = $request->get('fecha');
        $registroprensa->turno = $request->get('turno');
        $registroprensa->producto = $request->get('producto');
        $registroprensa->pzsbuenas = $request->get('pzsbuenas');
        $registroprensa->pzsmalas = $request->get('pzsmalas');
        $registroprensa->tiempoop = $request->get('tiempoop');
        $registroprensa->tiempomtto = $request->get('tiempomtto');
        $registroprensa->observaciones = $request->get('observaciones');
        $registroprensa->limpieza = $request->get('limpieza');

        $registroprensa->save();

        return redirect('/registroprensa');
    }

    public function destroy(string $id)
    {
        $registroprensa = Registroprensa::find($id);
        $registroprensa->delete();

        return redirect('/registroprensa');
    }
}
