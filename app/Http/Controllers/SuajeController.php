<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suaje;

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
        $suajes->modelo = $request->get('modelo');
        $suajes->cantidad = $request->get('cantidad');
        $suajes->corte = $request->get('corte');
        $suajes->estatus = $request->get('estatus');
        $suajes->ingreso = $request->get('ingreso');

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

        $suaje->modelo = $request->get('modelo');
        $suaje->cantidad = $request->get('cantidad');
        $suaje->corte = $request->get('corte');
        $suaje->estatus = $request->get('estatus');
        $suaje->ingreso = $request->get('ingreso');

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
