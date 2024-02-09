@extends('layouts.app')

@section('titulo')
    Bienvenido al sistema de RC TOOLS - Inicie sesión
@endsection

@section('contenido')
<div class="md:flex md:justify-center md:gap-4 md:items-center">
    <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
        <form method="POST" action="{{ route('login') }} " novalidate>
            @csrf            

            @if(session('mensaje'))
                 <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                    {{ session('mensaje') }}
                 </p>
            @endif 

            <div class="mb-5">
                <label for="email" class="mb-2 block uppercase text-gray-700 font-bold">
                    Correo electronico
                </label>
                <input
                    id="email"
                    name="email" 
                    type="email"
                    placeholder="E-mail de registro"
                    class="border p-3 w-full rounded-lg @error('email') border-red-500
                    @enderror"
                    value="{{ old('email') }}"
                />
                @error('email')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="password" class="mb-2 block uppercase text-gray-700 font-bold">
                    Contraseña
                </label>
                <input
                    id="password"
                    name="password" 
                    type="password"
                    placeholder="Contraseña de registro"
                    class="border p-3 w-full rounded-lg @error('passwrord') border-red-500
                    @enderror"
                    
                />
                @error('password')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>

            <input 
                type="submit"
                value="Iniciar sesión"
                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                uppercase font-bold w-full p-3 text-white rounded-lg"
            />
        </form>
    </div>
</div>
@endsection