<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Caja;

class CajaController extends Controller
{
    public function index()
    {
        $cajas = Caja::all();
        return view('cajas.index')->with('cajas',$cajas);
    }

    public function create()
    {
        return view('cajas.create');
    }

    public function store(Request $request)
    {
        $cajas = new Caja();

        $cajas->nombre = $request->get('nombre');
        $cajas->existencia = $request->get('existencia');
        $cajas->fecha_registro = $request->get('fecha_registro');
        $cajas->fecha_baja = $request->get('fecha_baja');
        
        $cajas->save();

        return redirect('/cajas');
    }

    public function show(string $id)
    {
       
    }

    public function edit(string $id)
    {
        $caja = Caja::find($id);
        return view('cajas.edit')->with('caja',$caja);
    }

    public function update(Request $request, string $id)
    {
        $caja = Caja::find($id);

        $caja->nombre = $request->get('nombre');
        $caja->existencia = $request->get('existencia');
        $caja->fecha_registro = $request->get('fecha_registro');
        $caja->fecha_baja = $request->get('fecha_baja');

        $caja->save();

        return redirect('/cajas');
    }

    
    public function destroy(string $id)
    {
        $caja = Caja::find($id);
        $caja->delete();

        return redirect('/cajas');
    }
}
