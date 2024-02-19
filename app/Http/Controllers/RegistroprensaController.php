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

        $registroprensas->empleado_id = $request->get('empleado_id');
        $registroprensas->maquina = $request->get('maquina');
        $registroprensas->hora = $request->get('hora');
        $registroprensas->fecha = $request->get('fecha');
        $registroprensas->turno = $request->get('turno');
        $registroprensas->linea = $request->get('linea');
        $registroprensas->producto_id = $request->get('producto_id');
        $registroprensas->piezas_buenas = $request->get('piezas_buenas');
        $registroprensas->piezas_malas = $request->get('piezas_malas');
        $registroprensas->tiempo_muerto_operador = $request->get('tiempo_muerto_operador');
        $registroprensas->tiempo_muerto_mantenimiento = $request->get('tiempo_muerto_mantenimiento');
        $registroprensas->causa = $request->get('causa');
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

        $registroprensa->empleado_id = $request->get('empleado_id');
        $registroprensa->maquina = $request->get('maquina');
        $registroprensa->hora = $request->get('hora');
        $registroprensa->fecha = $request->get('fecha');
        $registroprensa->turno = $request->get('turno');
        $registroprensa->linea = $request->get('linea');
        $registroprensa->producto_id = $request->get('producto_id');
        $registroprensa->piezas_buenas = $request->get('piezas_buenas');
        $registroprensa->piezas_malas = $request->get('piezas_malas');
        $registroprensa->tiempo_muerto_operador = $request->get('tiempo_muerto_operador');
        $registroprensa->tiempo_muerto_mantenimiento = $request->get('tiempo_muerto_mantenimiento');
        $registroprensa->causa = $request->get('causa');
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
