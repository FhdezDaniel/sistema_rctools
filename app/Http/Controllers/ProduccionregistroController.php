<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produccionregistro;

class ProduccionregistroController extends Controller
{
    public function index()
    {
        $produccionregistros = Produccionregistro::all();
        return view('registroproduccion.index')->with('produccionregistros',$produccionregistros);
    }

    public function create()
    {
        return view('registroproduccion.create');
    }

    public function store(Request $request)
    {
        $produccionregistros = new Produccionregistro();

        $produccionregistros->nombreop = $request->get('nombreop');
        $produccionregistros->maquina = $request->get('maquina');
        $produccionregistros->fecha = $request->get('fecha');
        $produccionregistros->turno = $request->get('turno');
        $produccionregistros->producto = $request->get('producto');
        $produccionregistros->pzsbuenas = $request->get('pzsbuenas');
        $produccionregistros->pzsmalas = $request->get('pzsmalas');
        $produccionregistros->tiempomto = $request->get('tiempomto');
        $produccionregistros->causa = $request->get('causa');
        $produccionregistros->tiempoop = $request->get('tiempoop');
        $produccionregistros->causa2 = $request->get('causa2');
        $produccionregistros->limpieza = $request->get('limpieza');

        $produccionregistros->save();

        return redirect('/registroproduccion');
    }


    public function show(string $id)
    {
        
    }

    public function edit(string $id)
    {
        $produccionregistro = Produccionregistro::find($id);
        return view('registroproduccion.edit')->with('produccionregistro',$produccionregistro);
    }

    public function update(Request $request, string $id)
    {

        $produccionregistro = Produccionregistro::find($id);

        $produccionregistro->nombreop = $request->get('nombreop');
        $produccionregistro->maquina = $request->get('maquina');
        $produccionregistro->fecha = $request->get('fecha');
        $produccionregistro->turno = $request->get('turno');
        $produccionregistro->producto = $request->get('producto');
        $produccionregistro->pzsbuenas = $request->get('pzsbuenas');
        $produccionregistro->pzsmalas = $request->get('pzsmalas');
        $produccionregistro->tiempomto = $request->get('tiempomto');
        $produccionregistro->causa = $request->get('causa');
        $produccionregistro->tiempoop = $request->get('tiempoop');
        $produccionregistro->causa2 = $request->get('causa2');
        $produccionregistro->limpieza = $request->get('limpieza');


        $produccionregistro->save();

        return redirect('/registroproduccion');
    }

    public function destroy(string $id)
    {
        $produccionregistro = Produccionregistro::find($id);
        $produccionregistro->delete();

        return redirect('/registroproduccion');
    }
}
