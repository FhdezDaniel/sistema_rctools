<?php

namespace App\Http\Controllers;
use App\Models\Materiaprima;

use Illuminate\Http\Request;

class MateriaprimaController extends Controller
{
    public function index()
    {
        $materiaprimas = Materiaprima::all();
        return view('materiaprima.index')->with('materiaprimas',$materiaprimas);
    }

    public function create()
    {
        return view('materiaprima.create');
    }

    public function store(Request $request)
    {
        $materiaprimas = new Materiaprima();

        $materiaprimas->nombre = $request->get('nombre');
        $materiaprimas->descripcion = $request->get('descripcion');
        $materiaprimas->existencia = $request->get('existencia');
        $materiaprimas->fecha_registro = $request->get('fecha_registro');
        
        $materiaprimas->save();

        return redirect('/materiaprima');
    }

    public function show(string $id)
    {
       
    }

    public function edit(string $id)
    {
        $materiaprima = Materiaprima::find($id);
        return view('materiaprima.edit')->with('materiaprima',$materiaprima);
    }

    public function update(Request $request, string $id)
    {
        $materiaprima = Materiaprima::find($id);

        $materiaprima->nombre = $request->get('nombre');
        $materiaprima->descripcion = $request->get('descripcion');
        $materiaprima->existencia = $request->get('existencia');
        $materiaprima->fecha_registro = $request->get('fecha_registro');

        $materiaprima->save();

        return redirect('/materiaprima');
    }

    
    public function destroy(string $id)
    {
        $materiaprima = Materiaprima::find($id);
        $materiaprima->delete();

        return redirect('/materiaprima');
    }
}
