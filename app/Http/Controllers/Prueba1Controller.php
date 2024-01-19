<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prueba1;

class Prueba1Controller extends Controller
{
    public function index()
    {
        $prueba1s = Prueba1::all();
        return view('prueba1.index')->with('prueba1s',$prueba1s);
    }

    public function create()
    {
        return view('prueba1.create');
       
    }

    public function store(Request $request)
    {
        $prueba1s = new Prueba1();
        $prueba1s->nombre = $request->get('nombre');
        $prueba1s->num_prueba = $request->get('num_prueba');
        $prueba1s->cantidad = $request->get('cantidad');
    
        $prueba1s->save();

        return redirect('/prueba1');
    }

    public function show(string $id)
    {

    }

   
    public function edit(string $id)
    {
        $prueba1 = Prueba1::find($id);
        return view('prueba1.edit')->with('prueba1',$prueba1);
            
    }

   
    public function update(Request $request, string $id)
    {
        $prueba1 = Prueba1::find($id);

        $prueba1->nombre = $request->get('nombre');
        $prueba1->num_prueba = $request->get('num_prueba');
        $prueba1->cantidad = $request->get('cantidad');
        
        $prueba1->save();
      
        return redirect('/prueba1');
        
    }

    public function destroy(string $id)
    {
        $prueba1 = Prueba1::find($id);
        $prueba1->delete();

        return redirect('/prueba1');
    }
}
