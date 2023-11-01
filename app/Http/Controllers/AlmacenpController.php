<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Almacenp;

class AlmacenpController extends Controller
{
   
    public function index()
    {
        $almacenps = Almacenp::all();
        return view('almacenprovisional.index')->with('almacenps',$almacenps);
    }

    public function create()
    {
        return view('almacenprovisional.create');
    }

    public function store(Request $request)
    {
        $almacenps = new Almacenp();
        $almacenps->nombre = $request->get('nombre');
        $almacenps->materia = $request->get('materia');
        $almacenps->piezas = $request->get('piezas');

        $almacenps->save();

        return redirect('/almacenprovisional');
    }

    public function show(string $id)
    {
        
    }

    public function edit(string $id)
    {
        $almacenp = Almacenp::find($id);
        return view('almacenprovisional.edit')->with('almacenps',$almacenp);
    }

    public function update(Request $request, string $id)
    {
        $almacenp = Almacenp::find($id);

        $almacenp->nombre = $request->get('nombre');
        $almacenp->materia = $request->get('materia');
        $almacenp->piezas = $request->get('piezas');

        $almacenp->save();

        return redirect('/almacenprovisional');
    }

    public function destroy(string $id)
    {
        $almacenp = Almacenp::find($id);
        $almacenp->delete();

        return redirect('/almacenprovisional');
    }
}
