<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Termoformadora;
use App\Models\Planproduccion;

class PlanproduccionController extends Controller
{
    public function index()
    {
        $planproduccions = Planproduccion::all();
        return view ('planproduccion.index')->with('planproduccions',$planproduccions);
    }
    
    public function create()
    {
        return view('planproduccion.create');
    }


    public function store(Request $request)
    {
        $planproduccions = new Planproduccion();
        $planproduccions->termoformadora_id = $request->get('termoformadora_id');
        $planproduccions->producto_id = $request->get('producto_id');
        $planproduccions->cantidad = $request->get('cantidad');
        $planproduccions->cantidad_empaquetado = $request->get('cantidad_empaquetado');
        $planproduccions->fecha_inicio = $request->get('fecha_inicio');
        $planproduccions->fecha_termino = $request->get('fecha_termino');
        $planproduccions->estatus = $request->get('estatus');

        $planproduccions->save();

        return redirect('/planproduccion');
    }

    public function show(string $id)
    {
        $planproduccions = Planproduccion::where('termoformadora_id','=',(int)$id)->get();
        return view ('planproduccion.lineas')->with('planproduccions',$planproduccions);
    }
    
    public function edit(string $id)
    {
        $planproduccion = Planproduccion::find($id);
        return view('/planproduccion.edit')->with('planproduccion',$planproduccion);
    }

  
    public function update(Request $request, string $id)
    {
        $planproduccion = Planproduccion::find($id);

        $planproduccion->termoformadora_id = $request->get('termoformadora_id');
        $planproduccion->producto_id = $request->get('producto_id');
        $planproduccion->cantidad = $request->get('cantidad');
        $planproduccion->cantidad_empaquetado = $request->get('cantidad_empaquetado');
        $planproduccion->fecha_inicio = $request->get('fecha_inicio');
        $planproduccion->fecha_termino = $request->get('fecha_termino');
        $planproduccion->estatus = $request->get('estatus');

        $planproduccion->save();

        return redirect('/planproduccion');
    }

    public function destroy(string $id)
    {
        $planproduccion = Planproduccion::find($id);
        $planproduccion->delete();

        return redirect('/planproduccion');
    }
}
