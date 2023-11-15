<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Termocuarta;

class TermocuartaController extends Controller
{
    public function index()
    {
        $termocuartas = Termocuarta::all();
        return view('termocuarta.index')->with('termocuartas',$termocuartas);
    }

    
    public function create()
    {
        return view('termocuarta.create');
    }

    public function store(Request $request)
    {
        $termocuartas = new Termocuarta();

        $termocuartas->producto = $request->get('producto');
        $termocuartas->cantidad = $request->get('cantidad');
        $termocuartas->corte = $request->get('corte');
        $termocuartas->material = $request->get('material');
        $termocuartas->inicio = $request->get('inicio');
        $termocuartas->termino = $request->get('termino');

        $termocuartas->save();

        return redirect('/termocuarta');
    }


    public function show(string $id)
    {
        
    }

    public function edit(string $id)
    {
        $termocuarta = Termocuarta::find($id);
        return view('termocuarta.edit')->with('termocuarta',$termocuarta);
    }

    
    public function update(Request $request, string $id)
    {
        $termocuarta = Termocuarta::find($id);

        $termocuarta->producto = $request->get('producto');
        $termocuarta->cantidad = $request->get('cantidad');
        $termocuarta->corte = $request->get('corte');
        $termocuarta->material = $request->get('material');
        $termocuarta->inicio = $request->get('inicio');
        $termocuarta->termino = $request->get('termino');

        $termocuarta->save();

        return redirect('/termocuarta');
    }

    
    public function destroy(string $id)
    {
        $termocuarta = Termocuarta::find($id);
        $termocuarta->delete();

        return redirect('/termocuarta');
    }
}
