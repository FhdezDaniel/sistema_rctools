<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bolsa;

class BolsaController extends Controller
{
    public function index()
    {
        $bolsas = Bolsa::all();
        return view('bolsas.index')->with('bolsas',$bolsas);
    }

    public function create()
    {
        return view('bolsas.create');
    }

    public function store(Request $request)
    {
        $bolsas = new Bolsa();

        $bolsas->nombre = $request->get('nombre');
        $bolsas->existencia = $request->get('existencia');
        $bolsas->fecha_registro = $request->get('fecha_registro');
        $bolsas->fecha_baja = $request->get('fecha_baja');
        
        $bolsas->save();

        return redirect('/bolsas');
    }

    public function show(string $id)
    {
       
    }

    public function edit(string $id)
    {
        $bolsa = Bolsa::find($id);
        return view('bolsas.edit')->with('bolsa',$bolsa);
    }

    public function update(Request $request, string $id)
    {
        $bolsa = Bolsa::find($id);

        $bolsa->nombre = $request->get('nombre');
        $bolsa->existencia = $request->get('existencia');
        $bolsa->fecha_registro = $request->get('fecha_registro');
        $bolsa->fecha_baja = $request->get('fecha_baja');

        $bolsa->save();

        return redirect('/bolsas');
    }

    
    public function destroy(string $id)
    {
        $bolsa = Bolsa::find($id);
        $bolsa->delete();

        return redirect('/bolsas');
    }
}
