@extends('layouts.app')

@section('titulo')
    Nombre de usuario: {{ $user->username }}
@endsection 

@section('contenido')

    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class="w-8/12 lg:w-6/12 px-5">
               <img src="{{ asset('images/user.jpg')}}" alt="imagen user"/>
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10">
                <p class="text-gray-700 text-2xl uppercase">{{ $user->username }}</p>
                <p class=>{{ $user->name }} {{ $user->apellidos}}</p>
            </div>
        </div>
    </div>
    <div class="mt-6 mr-60 flex flex-col items-start">
            <a href="/home" class="text-white bg-gray-400 hover:bg-gray-500 focus:outline-none focus:ring-[#4285F4]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#4285F4]/55 mr-2 mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                </svg>
                <span class="ml-2">REGRESAR</span>
            </a>  
    </div>

    

@endsection 