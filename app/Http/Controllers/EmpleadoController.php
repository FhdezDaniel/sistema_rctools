<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadoController extends Controller
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

        $empleados->numero_empleado = $request->get('numero_empleado');
        $empleados->nombres = $request->get('nombres');
        $empleados->apellido_paterno = $request->get('apellido_paterno');
        $empleados->apellido_materno = $request->get('apellido_materno');
        $empleados->puesto = $request->get('puesto');
        $empleados->fecha_nacimiento = $request->get('fecha_nacimiento');
        $empleados->fecha_ingreso = $request->get('fecha_ingreso');
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

        $empleado->numero_empleado = $request->get('numero_empleado');
        $empleado->nombres = $request->get('nombres');
        $empleado->apellido_paterno = $request->get('apellido_paterno');
        $empleado->apellido_materno = $request->get('apellido_materno');
        $empleado->puesto = $request->get('puesto');
        $empleado->fecha_nacimiento = $request->get('fecha_nacimiento');
        $empleado->fecha_ingreso = $request->get('fecha_ingreso');
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
