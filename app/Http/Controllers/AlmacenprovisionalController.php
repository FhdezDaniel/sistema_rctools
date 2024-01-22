<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Almacenprovisional;

class AlmacenprovisionalController extends Controller
{
    public function index()
    {
        $almacenprovisionals = Almacenprovisional::all();
        return view('almacenprovisional.index')->with('almacenprovisionals',$almacenprovisionals);
    }

    public function create()
    {
        return view('almacenprovisional.create');
    }

    public function store(Request $request)
    {
        $almacenprovisionals = new Almacenprovisional();
        $almacenprovisionals->producto_id = $request->get('producto_id');
        $almacenprovisionals->material = $request->get('material');
        $almacenprovisionals->piezas = $request->get('piezas');

        $almacenprovisionals->save();

        return redirect('/almacenprovisional');
    }

    public function show(string $id)
    {
        
    }

    public function edit(string $id)
    {
        $almacenprovisional = Almacenprovisional::find($id);
        return view('almacenprovisional.edit')->with('almacenprovisionals',$almacenprovisional);
    }

    public function update(Request $request, string $id)
    {
        $almacenprovisional = Almacenprovisional::find($id);

        $almacenprovisional->producto_id = $request->get('producto_id');
        $almacenprovisional->material = $request->get('material');
        $almacenprovisional->piezas = $request->get('piezas');

        $almacenprovisional->save();

        return redirect('/almacenprovisional');
    }

    public function destroy(string $id)
    {
        $almacenprovisional = Almacenprovisional::find($id);
        $almacenprovisional->delete();

        return redirect('/almacenprovisional');
    }
}