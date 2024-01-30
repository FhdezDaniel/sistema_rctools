<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Corte;

class CorteController extends Controller
{
    public function index()
    {
        $cortes = Corte::all();
        return view('cortes.index')->with('cortes',$cortes);
    }

    public function create()
    {
        return view('cortes.create');
    }

    public function store(Request $request)
    {
        $cortes = new Corte();

        $cortes->nombre = $request->get('nombre');
        $cortes->fecha_registro = $request->get('fecha_registro');
        
        $cortes->save();

        return redirect('/cortes');
    }

    public function show(string $id)
    {
       
    }

    public function edit(string $id)
    {
        $corte = Corte::find($id);
        return view('cortes.edit')->with('corte',$corte);
    }

    public function update(Request $request, string $id)
    {
        $corte = Corte::find($id);

        $corte->nombre = $request->get('nombre');
        $corte->fecha_registro = $request->get('fecha_registro');

        $corte->save();

        return redirect('/cortes');
    }

    
    public function destroy(string $id)
    {
        $corte = Corte::find($id);
        $corte->delete();

        return redirect('/cortes');
    }
}
