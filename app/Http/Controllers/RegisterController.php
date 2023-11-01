<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }
    
    public function store(Request $request)
    {
        //dd($request);

        // Modificar el request 
        $request->request->add(['username' => Str::slug($request->username)]);


        // Validación
        $this->validate($request, [
            'name' => 'required',
            'apellidos' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'apellidos' => $request->apellidos,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
        ]);


        // Autenticar un usuario 
        // Forma 1

        /*
        auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);
        */

        //Forma 2
        auth()->attempt($request->only('email','password'));


        // Redireccionar 
        //return redirect()->route('posts.index', auth()->user()->username);
        return view('/home');
    }
}
