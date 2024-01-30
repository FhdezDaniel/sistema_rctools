<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suaje;
use App\Models\Corte;

class SuajeController extends Controller
{
    public function index()
    {
        $suajes = Suaje::all();
        return view('suajes.index')->with('suajes',$suajes);
    }

    public function create()
    {
        return view('suajes.create');
    }

    public function store(Request $request)
    {
        $suajes = new Suaje();

        $suajes->codigo = $request->get('codigo');
        $suajes->corte_id = $request->get('corte_id');
        $suajes->activo = $request->get('activo');
        $suajes->cantidad = $request->get('cantidad');
        $suajes->comentarios = $request->get('comentarios');
        $suajes->estatus = $request->get('estatus');
        
        $suajes->save();

        return redirect('/suajes');
    }

    public function show(string $id)
    {
        
    }

    public function edit(string $id)
    {
        $suaje = Suaje::find($id);
        return view('suajes.edit')->with('suajes',$suaje);
    }

    public function update(Request $request, string $id)
    {
        $suaje = Suaje::find($id);

        $suaje->codigo = $request->get('codigo');
        $suaje->corte_id = $request->get('corte_id');
        $suaje->activo = $request->get('activo');
        $suaje->cantidad = $request->get('cantidad');
        $suaje->comentarios = $request->get('comentarios');
        $suaje->estatus = $request->get('estatus');

        $suaje->save();

        return redirect('/suajes');
    }   
    
    public function destroy(string $id)
    {
        $suaje = Suaje::find($id);
        $suaje->delete();

        return redirect('/suajes');
    }
}
