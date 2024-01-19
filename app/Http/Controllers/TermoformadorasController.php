<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Termoformadora;

class TermoformadorasController extends Controller
{
    public function index()
    {
        $termoformadoras = Termoformadora::all();
        return view('termoformadoras.index')->with('termoformadoras',$termoformadoras);
    }

    public function create()
    {
        return view('termoformadoras.create');
    }

    
    public function store(Request $request)
    {
        $termoformadoras = new Termoformadora();
        $termoformadoras->termoformadora = $request->get('termoformadora');
        $termoformadoras->producto = $request->get('producto');
        $termoformadoras->suaje_id = $request->get('suaje_id');
        $termoformadoras->cantidad = $request->get('cantidad');
        $termoformadoras->corte = $request->get('corte');
        $termoformadoras->material = $request->get('material');
        $termoformadoras->inicio = $request->get('inicio');
        $termoformadoras->termino = $request->get('termino');
        $termoformadoras->estatus = $request->get('estatus');
        
        $termoformadoras->save();

        return redirect('/termoformadoras');
    }


    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $termoformadora = Termoformadora::find($id);
        return view('termoformadoras.edit')->with('termoformadora',$termoformadora);
    }

    public function update(Request $request, string $id)
    {
        $termoformadora = Termoformadora::find($id);

        $termoformadora->termoformadora = $request->get('termoformadora');
        $termoformadora->producto = $request->get('producto');
        $termoformadora->suaje_id = $request->get('suaje_id');
        $termoformadora->cantidad = $request->get('cantidad');
        $termoformadora->corte = $request->get('corte');
        $termoformadora->material = $request->get('material');
        $termoformadora->inicio = $request->get('inicio');
        $termoformadora->termino = $request->get('termino');
        $termoformadora->estatus = $request->get('estatus');

        $termoformadora->save();

        return redirect('/termoformadoras');

    }

    public function destroy(string $id)
    {
        $termoformadora = Termoformadora::find($id);
        $termoformadora->delete();

        return redirect('/termoformadoras');
    }
}
