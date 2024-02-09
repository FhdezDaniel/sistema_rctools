<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Esquema;

class EsquemaController extends Controller
{
    public function index()
    {
        $esquemas = Esquema::all();
        return view ('esquemas.index')->with('esquemas',$esquemas);
    }
    

    public function moveAfter($entity){
        $entity = Esquema::find(1);

        $positionEntity = Esquema::find(10);
        
        $entity->moveAfter($positionEntity);
    }


    public function moveBefore($entity){
        $entity = Esquema::find(1);

        $positionEntity = Esquema::find(10);
        
        $entity->moveBefore($positionEntity);
        
    }

    public function create()
    {
        return view('esquemas.create');

    }


    public function store(Request $request)
    {
        $esquemas = new Esquema();

        $esquemas->termo = $request->get('termo');
        $esquemas->producto = $request->get('producto');
        $esquemas->position = $request->get('position');
        
        $esquemas->save();

        return redirect('/esquemas');
    }

    public function show(string $id)
    {
    }
    
    public function edit(string $id)
    {
        $esquema = Esquema::find($id);
        return view('/esquemas.edit')->with('esquema',$esquema);
    }

  
    public function update(Request $request, string $id)
    {
        $esquema = Esquema::find($id);

        $esquema->termo = $request->get('termo');
        $esquema->producto = $request->get('producto');
        $esquema->position = $request->get('position');
        
        $esquema->save();

        return redirect('/esquemas');
    }

    public function destroy(string $id)
    {
        $esquema = Esquema::find($id);
        $esquema->delete();

        return redirect('/esquemas');
    }
}
