<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Bolsa;
use App\Models\Caja;
use App\Models\Materiaprima;
use App\Models\Suaje;


class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index')->with('productos',$productos);
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $productos = new Producto();

        $productos->clave = $request->get('clave');
        $productos->nombre = $request->get('nombre');
        $productos->suaje_id = $request->get('suaje_id');
        $productos->materiaprima_id = $request->get('materiaprima_id');
        $productos->caja_id = $request->get('caja_id');
        $productos->bolsa_id = $request->get('bolsa_id');
        $productos->fecha_registro = $request->get('fecha_registro');
       
        $productos->save();

        return redirect('/productos');
    }
    
    public function show(string $id)
    {
        
    }

    public function edit(string $id)
    {
        $producto = Producto::find($id);
        return view('productos.edit')->with('producto',$producto);
        
    }
    
    public function update(Request $request, string $id)
    {
        $producto = Producto::find($id);

        $producto->clave = $request->get('clave');
        $producto->nombre = $request->get('nombre');
        $producto->suaje_id = $request->get('suaje_id');
        $producto->materiaprima_id = $request->get('materiaprima_id');
        $producto->caja_id = $request->get('caja_id');
        $producto->bolsa_id = $request->get('bolsa_id');
        $producto->fecha_registro = $request->get('fecha_registro');
        
        $producto->save();

        return redirect('/productos');
        
    }

    public function destroy(string $id)
    {
        $producto = Producto::find($id);
        $producto->delete();

        return redirect('/productos');
        
    }
}
