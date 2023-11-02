<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Termo1;


class Termo1Controller extends Controller
{

    public function index()
    {
        $termo1s = Termo1::all();
        return view('planproduccion.index')->with('termo1s',$termo1s);
       
    }

    public function create()
    {
        return view('planproduccion.create');
       
    }

    public function store(Request $request)
    {
        $termo1s = new Termo1();
        $termo1s->producto = $request->get('producto');
        $termo1s->cantidad = $request->get('cantidad');
        $termo1s->corte = $request->get('corte');
        $termo1s->material = $request->get('material');
        $termo1s->inicio = $request->get('inicio');
        $termo1s->termino = $request->get('termino');

        $termo1s->save();

        return redirect('/planproduccion');
    }

    public function show(string $id)
    {

    }

   
    public function edit(string $id)
    {
        $termo1 = Termo1::find($id);
        return view('planproduccion.edit')->with('termo1',$termo1);
        
    }

   
    public function update(Request $request, string $id)
    {
        $termo1 = Termo1::find($id);

        $termo1->producto = $request->get('producto');
        $termo1->cantidad = $request->get('cantidad');
        $termo1->corte = $request->get('corte');
        $termo1->material = $request->get('material');
        $termo1->inicio = $request->get('inicio');
        $termo1->termino = $request->get('termino');

        $termo1->save();

        return redirect('/planproduccion');
    }

    public function destroy(string $id)
    {
        $termo1 = Termo1::find($id);
        $termo1->delete();

        return redirect('/planproduccion');
    }
}
