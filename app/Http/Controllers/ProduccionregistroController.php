<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produccionregistro;

class ProduccionregistroController extends Controller
{
    public function index()
    {
        $produccionregistros = Produccionregistro::all();
        return view('registroproduccion.index')->with('produccionregistros',$produccionregistros);
    }

    public function create()
    {
       
    }

    public function store(Request $request)
    {
       
    }


    public function show(string $id)
    {
        
    }

    public function edit(string $id)
    {
       
    }

    public function update(Request $request, string $id)
    {

       
    }

    public function destroy(string $id)
    {
        
    }
}
