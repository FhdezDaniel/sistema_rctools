<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadosController extends Controller
{
    public function index()
    {
        $empleados = Empleado::all();
        return view('empleados.index')->with('empleados',$empleados);
    }

    public function create()
    {
        return view('empleados.create');
    }

    public function store(Request $request)
    {
        $empleados = new Empleado();

        $empleados->numempleado = $request->get('numempleado');
        $empleados->nombre = $request->get('nombre');
        $empleados->apepaterno = $request->get('apepaterno');
        $empleados->apematerno = $request->get('apematerno');
        $empleados->puesto = $request->get('puesto');
        $empleados->fechanacimiento = $request->get('fechanacimiento');
        $empleados->fechaingreso = $request->get('fechaingreso');
        $empleados->correo = $request->get('correo');
        
        $empleados->save();

        return redirect('/empleados');


    }

    
    public function show(string $id)
    {
        
    }

    
    public function edit(string $id)
    {
        $empleado = Empleado::find($id);
        return view('empleados.edit')->with('empleado',$empleado);
        
    }
    
    public function update(Request $request, string $id)
    {
        $empleado = Empleado::find($id);

        $empleado->numempleado = $request->get('numempleado');
        $empleado->nombre = $request->get('nombre');
        $empleado->apepaterno = $request->get('apepaterno');
        $empleado->apematerno = $request->get('apematerno');
        $empleado->puesto = $request->get('puesto');
        $empleado->fechanacimiento = $request->get('fechanacimiento');
        $empleado->fechaingreso = $request->get('fechaingreso');
        $empleado->correo = $request->get('correo');
        
        $empleado->save();

        return redirect('/empleados');
        
    }

    
    public function destroy(string $id)
    {
        $empleado = Empleado::find($id);
        $empleado->delete();

        return redirect('/empleados');
        
    }
}
