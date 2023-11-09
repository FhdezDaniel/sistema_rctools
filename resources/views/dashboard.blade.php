@extends('layouts.app')

@section('titulo')
    Perfil: {{ $user->username }}
@endsection 

@section('contenido')

    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class="w-8/12 lg:w-6/12 px-5">
               <img src="{{ asset('images/user.jpg')}}" alt="imagen user"/>
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10">
                <p class="text-gray-700 text-2xl">{{ $user->username }}</p>

                <p class=" text-gray-800 text-sm mb-3 font-bold mt-5">
                    
                <span class="font-normal">Jefe de calidad / Jefe de SGC</span>
                </p>
                <p class=" text-gray-800 text-sm mb-3 font-bold">
                    
                <span class="font-normal">5 años laborando en la empresa</span>
                </p>
            </div>

        </div>
    </div>

    <section class="container mx-auto mt">
        <h2 class="text-4xl text-center font-black my-10">Archvivos</h2>


    @if($posts->count())

    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
     @foreach($posts as $post)
        <div>
            <a href="{{ route('posts.show', ['post' => $post, 'user' => $user]) }}">
                <img src="{{ asset('uploads').'/'.$post->imagen }}" alt="Imagen del post {{ $post->titulo }}">
            </a>
        </div>
     @endforeach
    </section>
    </div>

    @else
        <p class="text-gray-600 uppercase text-sm text-center font-bold">No hay información</p>
    @endif

@endsection 