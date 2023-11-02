<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Termoquinta;

class TermoquintaController extends Controller
{
    public function index()
    {
        $termoquintas = Termoquinta::all();
        return view('termoquinta.index')->with('termoquintas',$termoquintas);
    }

    public function create()
    {
        return view('termoquinta.create');
    }

    public function store(Request $request)
    {
        $termoquintas = new Termoquinta();

        $termoquintas->producto = $request->get('producto');
        $termoquintas->cantidad = $request->get('cantidad');
        $termoquintas->corte = $request->get('corte');
        $termoquintas->material = $request->get('material');
        $termoquintas->inicio = $request->get('inicio');
        $termoquintas->termino = $request->get('termino');

        $termoquintas->save();

        return redirect('/termoquinta');
    }

    public function show(string $id)
    {
        
    }

    public function edit(string $id)
    {
        $termoquinta = Termoquinta::find($id);
        return view('termoquinta.edit')->with('termoquinta',$termoquinta);
    }

    public function update(Request $request, string $id)
    {
        $termoquinta = Termoquinta::find($id);

        $termoquinta->producto = $request->get('producto');
        $termoquinta->cantidad = $request->get('cantidad');
        $termoquinta->corte = $request->get('corte');
        $termoquinta->material = $request->get('material');
        $termoquinta->inicio = $request->get('inicio');
        $termoquinta->termino = $request->get('termino');

        $termoquinta->save();

        return redirect('/termoquinta');
    }

    public function destroy(string $id)
    {
        $termoquinta = Termoquinta::find($id);
        $termoquinta->delete();

        return redirect('/termoquinta');
    }
}
