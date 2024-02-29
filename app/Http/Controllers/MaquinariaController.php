<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maquinaria;

class MaquinariaController extends Controller
{
    public function index()
    {
        $maquinarias = Maquinaria::all();
        return view('maquinarias.index')->with('maquinarias',$maquinarias);
    }

    public function create()
    {
        return view('maquinarias.create');
    }

    public function store(Request $request)
    {
        $maquinarias = new Empleado();

        $maquinarias->id = $request->get('id');
        $maquinarias->descripcion = $request->get('descripcion');
       
        $maquinarias->save();

        return redirect('/maquinarias');
    }
    
    public function show(string $id)
    {
        
    }

    public function edit(string $id)
    {
        $maquinaria = Maquinaria::find($id);
        return view('maquinarias.edit')->with('maquinaria',$maquinaria);
        
    }
    
    public function update(Request $request, string $id)
    {
        $maquinaria = Maquinaria::find($id);

        $maquinaria->id = $request->get('id');
        $maquinaria->descripcion = $request->get('descripcion');

        $maquinaria->save();

        return redirect('/maquinarias');
        
    }

    public function destroy(string $id)
    {
        $maquinaria = Maquinaria::find($id);
        $maquinaria->delete();

        return redirect('/maquinarias');
        
    }
}
