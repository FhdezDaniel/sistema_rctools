<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produccion;

class ProduccionController extends Controller
{
   
    public function index()
    {
        return view('produccion.index');
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
