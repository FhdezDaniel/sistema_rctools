<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suajemodelo;

class SuajemodeloController extends Controller
{
    public function index()
    {
        $suajemodelos = Suajemodelo::all();
        return view('suajemodelos.index')->with('suajemodelos',$suajemodelos);
    }

    public function create()
    {
        return view('suajemodelos.create');
    }

    public function store(Request $request)
    {
        $suajemodelos = new Suajemodelo();

        $suajemodelos->codigo = $request->get('codigo');
        $suajemodelos->activo = $request->get('activo');
        $suajemodelos->comentarios = $request->get('comentarios');
        $suajemodelos->estatus = $request->get('estatus');
        

        $suajemodelos->save();

        return redirect('/suajemodelos');
    }

    public function show(string $id)
    {
        
    }

    public function edit(string $id)
    {
        $suajemodelo = Suajemodelo::find($id);
        return view('suajemodelos.edit')->with('suajemodelos',$suajemodelo);
    }

    public function update(Request $request, string $id)
    {
        $suajemodelo = Suajemodelo::find($id);

        $suajemodelo->codigo = $request->get('codigo');
        $suajemodelo->activo = $request->get('activo');
        $suajemodelo->comentarios = $request->get('comentarios');
        $suajemodelo->estatus = $request->get('estatus');

        $suajemodelo->save();

        return redirect('/suajemodelos');
    }   
    
    public function destroy(string $id)
    {
        $suajemodelo = Suajemodelo::find($id);
        $suajemodelo->delete();

        return redirect('/suajemodelos');
    }
}
