<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventarioSuaje;

class InventarioSuajeController extends Controller
{
    public function index()
    {
        $inventariosuajes = InventarioSuaje::all();
        return view('inventariosuajes.index')->with('inventariosuajes',$inventariosuajes);
    }

    public function create()
    {
        return view('inventariosuajes.create');
    }

    public function store(Request $request)
    {
        $inventariosuajes = new InventarioSuaje();

        $inventariosuajes->suaje_id = $request->get('suaje_id');
        $inventariosuajes->contador_uso = $request->get('contador_uso');
        $inventariosuajes->fecha_registro = $request->get('fecha_registro');
        $inventariosuajes->fecha_evento = $request->get('fecha_evento');
        $inventariosuajes->fecha_baja = $request->get('fecha_baja');
        $inventariosuajes->historial = $request->get('historial');
        
        $inventariosuajes->save();

        return redirect('/inventariosuajes');
    }

    public function show(string $id)
    {
        
    }

    public function edit(string $id)
    {
        $inventariosuaje = InventarioSuaje::find($id);
        return view('inventariosuajes.edit')->with('inventariosuajes',$inventariosuaje);
    }

    public function update(Request $request, string $id)
    {
        $inventariosuaje = InventarioSuaje::find($id);

        $inventariosuaje->suaje_id = $request->get('suaje_id');
        $inventariosuaje->contador_uso = $request->get('contador_uso');
        $inventariosuaje->fecha_registro = $request->get('fecha_registro');
        $inventariosuaje->fecha_evento = $request->get('fecha_evento');
        $inventariosuaje->fecha_baja = $request->get('fecha_baja');
        $inventariosuaje->historial = $request->get('historial');
        
        $inventariosuaje->save();

        return redirect('/inventariosuajes');
    }   
    
    public function destroy(string $id)
    {
        $inventariosuaje = InventarioSuaje::find($id);
        $inventariosuaje->delete();

        return redirect('/inventariosuajes');
    }
}
