<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Termoprimera;

class TermoprimeraController extends Controller
{
    public function index()
    {
        $termoprimeras = Termoprimera::all();
        return view('termoprimera.index')->with('termoprimeras',$termoprimeras);
    }

    public function create()
    {
        return view('termoprimera.create');
       
    }

    public function store(Request $request)
    {
        $termoprimeras = new Termoprimera();
        $termoprimeras->producto = $request->get('producto');
        $termoprimeras->cantidad = $request->get('cantidad');
        $termoprimeras->corte = $request->get('corte');
        $termoprimeras->material = $request->get('material');
        $termoprimeras->inicio = $request->get('inicio');
        $termoprimeras->termino = $request->get('termino');

        $termoprimeras->save();

        return redirect('/termoprimera');
    }

    public function show(string $id)
    {

    }

   
    public function edit(string $id)
    {
        $termoprimera = Termoprimera::find($id);
        return view('termoprimera.edit')->with('termoprimera',$termoprimera);
            
    }

   
    public function update(Request $request, string $id)
    {
        $termoprimera = Termoprimera::find($id);

        $termoprimera->producto = $request->get('producto');
        $termoprimera->cantidad = $request->get('cantidad');
        $termoprimera->corte = $request->get('corte');
        $termoprimera->material = $request->get('material');
        $termoprimera->inicio = $request->get('inicio');
        $termoprimera->termino = $request->get('termino');
        
        $termoprimera->save();
      
        return redirect('/termoprimera');
        
    }

    public function destroy(string $id)
    {
        $termoprimera = Termoprimera::find($id);
        $termoprimera->delete();

        return redirect('/termoprimera');
    }
}
