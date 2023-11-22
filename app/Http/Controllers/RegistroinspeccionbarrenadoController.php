<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registroinspeccion;

class RegistroinspeccionbarrenadoController extends Controller
{
    
    public function index()
    {
        $registroinspeccions = Registroinspeccion::all();
        return view('registroinspeccionbarrenado.index')->with('registroinspeccions',$registroinspeccions);
    }

    public function create()
    {
        return view('registroinspeccionbarrenado.create');
    }


    public function store(Request $request)
    {
        $registroinspeccions = new Registroinspeccion();

        $registroinspeccions->nombreop = $request->get('nombreop');
        $registroinspeccions->maquina = $request->get('maquina');
        $registroinspeccions->fecha = $request->get('fecha');
        $registroinspeccions->turno = $request->get('turno');
        $registroinspeccions->producto = $request->get('producto');
        $registroinspeccions->totalpzs = $request->get('totalpzs');
        $registroinspeccions->pzsmalas = $request->get('pzsmalas');
        $registroinspeccions->tiempoop = $request->get('tiempoop');
        $registroinspeccions->tiempomtto = $request->get('tiempomtto');
        $registroinspeccions->limpieza = $request->get('limpieza');

        $registroinspeccions->save();

        return redirect('/registroinspeccionbarrenado');
    }

    public function show(string $id)
    {
    
    }

    public function edit(string $id)
    {
        $registroinspeccion = Registroinspeccion::find($id);
        return view('registroinspeccionbarrenado.edit')->with('registroinspeccion',$registroinspeccion);
    }

    public function update(Request $request, string $id)
    {
        $registroinspeccion = Registroinspeccion::find($id);

        $registroinspeccion->nombreop = $request->get('nombreop');
        $registroinspeccion->maquina = $request->get('maquina');
        $registroinspeccion->fecha = $request->get('fecha');
        $registroinspeccion->turno = $request->get('turno');
        $registroinspeccion->producto = $request->get('producto');
        $registroinspeccion->totalpzs = $request->get('totalpzs');
        $registroinspeccion->pzsmalas = $request->get('pzsmalas');
        $registroinspeccion->tiempoop = $request->get('tiempoop');
        $registroinspeccion->tiempomtto = $request->get('tiempomtto');
        $registroinspeccion->limpieza = $request->get('limpieza');

        $registroinspeccion->save();

        return redirect('/registroinspeccionbarrenado');
    }

   
    public function destroy(string $id)
    {
        $registroinspeccion = Registroinspeccion::find($id);
        $registroinspeccion->delete();

        return redirect('/registroinspeccionbarrenado');
    }
}
