<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Apps\Models\Planproduccion;

class PlanproduccionController extends Controller
{
    public function index()
    {
        return view('planproduccion.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
