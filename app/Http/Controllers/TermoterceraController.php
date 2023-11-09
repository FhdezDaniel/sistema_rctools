<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Termotercera;

class TermoterceraController extends Controller
{
    public function index()
    {
        $termoterceras = Termotercera::all();
        return view('termotercera.index')->with('termoterceras',$termoterceras);
    }

    public function create()
    {
        return view('termotercera.create');
    }

    public function store(Request $request)
    {
        $termoterceras = new Termotercera();

        $termoterceras->producto = $request->get('producto');
        $termoterceras->cantidad = $request->get('cantidad');
        $termoterceras->corte = $request->get('corte');
        $termoterceras->material = $request->get('material');
        $termoterceras->inicio = $request->get('inicio');
        $termoterceras->termino = $request->get('termino');
        $termoterceras->suaje = $request->get('suaje');

        $termoterceras->save();

        return redirect('/termotercera');
    }


    public function show(string $id)
    {
        
    }

    public function edit(string $id)
    {
        $termotercera = Termotercera::find($id);
        return view('termotercera.edit')->with('termotercera',$termotercera);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $termotercera = Termotercera::find($id);

        $termotercera->producto = $request->get('producto');
        $termotercera->cantidad = $request->get('cantidad');
        $termotercera->corte = $request->get('corte');
        $termotercera->material = $request->get('material');
        $termotercera->inicio = $request->get('inicio');
        $termotercera->termino = $request->get('termino');
        $termotercera->suaje = $request->get('suaje');

        $termotercera->save();

        return redirect('/termotercera');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $termotercera = Termotercera::find($id);
        $termotercera->delete();

        return redirect('/termotercera');
    }
}
