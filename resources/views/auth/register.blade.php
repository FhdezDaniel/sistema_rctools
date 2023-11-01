@extends('layouts.app')

@section('titulo')
    Registro de usuario 
@endsection

@section('contenido')
<div class="md:flex md:justify-center md:gap-4 md:items-center">
    <div class="md:w-4/12 p-5">
        <img src="{{ asset('images/rctoolslogo.jpg') }}" alt="img-registro">
    </div>
   
    <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-5">
                <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                    Nombre
                </label>
                <input
                    id="name"
                    name="name" 
                    type="text"
                    placeholder="Escriba su nombre"
                    class="border p-3 w-full rounded-lg @error('name') border-red-500
                    @enderror"
                    value="{{ old('name') }}"
                />
                @error('name')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="apellidos" class="mb-2 block uppercase text-gray-500 font-bold">
                    Apellidos 
                </label>
                <input
                    id="apellidos"
                    name="apellidos" 
                    type="text"
                    placeholder="Escriba su apellido"
                    class="border p-3 w-full rounded-lg @error('apellidos') border-red-500
                    @enderror"
                    value="{{ old('apellidos') }}"
                />
                @error('apellidos')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                    Nombre de usuario 
                </label>
                <input
                    id="username"
                    name="username" 
                    type="text"
                    placeholder="Escriba su nombre de usuario"
                    class="border p-3 w-full rounded-lg @error('username') border-red-500
                    @enderror"
                    value="{{ old('username') }}"
                />
                @error('username')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                    Correo electronico
                </label>
                <input
                    id="email"
                    name="email" 
                    type="email"
                    placeholder="Tu E-mail de registro"
                    class="border p-3 w-full rounded-lg @error('email') border-red-500
                    @enderror"
                    value="{{ old('email') }}"
                />
                @error('email')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                    Contraseña
                </label>
                <input
                    id="password"
                    name="password" 
                    type="password"
                    placeholder="Contraseña de registro"
                    class="border p-3 w-full rounded-lg @error('password') border-red-500
                    @enderror"
                   
                />
                @error('password')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
                    Confirmar contraseña
                </label>
                <input
                    id="password_confirmation"
                    name="password_confirmation" 
                    type="password"
                    placeholder="Confirme su contraseña"
                    class="border p-3 w-full rounded-lg @error('password-confirmation') border-red-500
                    @enderror"
                />
                @error('password-confirmation')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>
            <input 
                type="submit"
                value="Crear cuenta"
                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                uppercase font-bold w-full p-3 text-white rounded-lg"
            />
        </form>
    </div>
</div>
@endsection