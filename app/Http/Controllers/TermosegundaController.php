<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Termosegunda;

class TermosegundaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $termosegundas = Termosegunda::all();
        return view('termosegunda.index')->with('termosegundas',$termosegundas);
    }

    public function create()
    {
        return view('termosegunda.create');
    }

    public function store(Request $request)
    {
        $termosegundas = new Termosegunda();

        $termosegundas->producto = $request->get('producto');
        $termosegundas->cantidad = $request->get('cantidad');
        $termosegundas->corte = $request->get('corte');
        $termosegundas->material = $request->get('material');
        $termosegundas->inicio = $request->get('inicio');
        $termosegundas->termino = $request->get('termino');
        $termosegundas->suaje = $request->get('suaje');

        $termosegundas->save();

        return redirect('/termosegunda');
    }


    public function show(string $id)
    {
        
    }

    public function edit(string $id)
    {
        $termosegunda = Termosegunda::find($id);
        return view('termosegunda.edit')->with('termosegunda',$termosegunda);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $termosegunda = Termosegunda::find($id);

        $termosegunda->producto = $request->get('producto');
        $termosegunda->cantidad = $request->get('cantidad');
        $termosegunda->corte = $request->get('corte');
        $termosegunda->material = $request->get('material');
        $termosegunda->inicio = $request->get('inicio');
        $termosegunda->termino = $request->get('termino');
        $termosegunda->suaje = $request->get('suaje');

        $termosegunda->save();

        return redirect('/termosegunda');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $termosegunda = Termosegunda::find($id);
        $termosegunda->delete();

        return redirect('/termosegunda');
    }
}
