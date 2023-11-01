<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Termo2;

class Termo2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $termo2s = Termo2::all();
        return view('planproduccion.index')->with('termo2s',$termo2s);
    }

    public function create()
    {
        return view('planproduccion.termo2.create2');
    }

    public function store(Request $request)
    {
        $termo2s = new Termo2();
        $termo2s->producto = $request->get('producto');
        $termo2s->cantidad = $request->get('cantidad');
        $termo2s->corte = $request->get('corte');
        $termo2s->material = $request->get('material');
        $termo2s->inicio = $request->get('inicio');
        $termo2s->termino = $request->get('termino');

        $termo2s->save();

        return redirect('/planproduccion');
    }

    public function show(string $id)
    {
        
    }

    public function edit(string $id)
    {
        $termo2 = Termo2::find($id);
        return view('planproduccion.termo2.edit2')->with('termo2',$termo2);
    }

    public function update(Request $request, string $id)
    {
        $termo2 = Termo2::find($id);

        $termo2->producto = $request->get('producto');
        $termo2->cantidad = $request->get('cantidad');
        $termo2->corte = $request->get('corte');
        $termo2->material = $request->get('material');
        $termo2->inicio = $request->get('inicio');
        $termo2->termino = $request->get('termino');

        $termo2->save();

        return redirect('/planproduccion');
    }

    public function destroy(string $id)
    {
        $termo2 = Termo2::find($id);
        $termo2->delete();

        return redirect('/planproduccion');
    }
}
