<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
            @stack('styles')
            @vite('resources/css/app.css')
            @vite('resources/js/app.js')
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <link rel="shortcut icon" href="{{ asset('images/rctoolslogo.jpg') }}">
        <title>RC Tools - Termoformadoras</title>
    </head>

    <header>
            <section>
            <nav class="flex justify-between bg-red-700 text-neutral-100 w-screen" :class="{'flex': open, 'hidden': !open}">
                <div class="px-10 py-4 flex w-screen items-center">
                <img class="h-16" src="{{ asset('images/rctoolslogo.jpg') }}" alt="logo"> 
                    <a class="text-3xl font-sans font-medium ml-3 hover:text-black uppercase" href="/home">
                        RC Tools 
                    </a>

                    <ul class="hidden md:flex px-4 mx-auto font-sans font-medium space-x-12">
                        <li><a class="hover:text-black text-lg uppercase" href="/home">Inicio</a></li>
                        
                        <li class="hover:text-black text-lg">
                        <div @click.away="open = false" class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="flex items-center text-lg font-sans font-medium rounded-lg uppercase">
                            <span>Producción</span>
                            <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-01"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </button>
                            <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                            <div class="px-2 py-2 bg-gray-200 rounded-md shadow dark-mode:bg-gray-800">
                            <a class="block px-4 py-2 mt-2 text-base text-black font-semibold  rounded-lg hover:bg-slate-300 uppercase" href="/produccion">Producción</a>
                            <a class="block px-4 py-2 mt-2 text-base text-black font-semibold  rounded-lg hover:bg-slate-300 uppercase" href="/plan">Plan de producción</a>
                            <a class="block px-4 py-2 mt-2 text-base text-black font-semibold  rounded-lg hover:bg-slate-300 uppercase" href="/registrosproduccion">Registro de producción</a>
                            <a class="block px-4 py-2 mt-2 text-base text-black font-semibold  rounded-lg hover:bg-slate-300 uppercase" href="/almacenprovisional">Almacen provisional</a>
                            <a class="block px-4 py-2 mt-2 text-base text-black font-semibold  rounded-lg hover:bg-slate-300 uppercase" href="/suajes">Suajes</a>
                            <a class="block px-4 py-2 mt-2 text-base text-black font-semibold  rounded-lg hover:bg-slate-300 uppercase" href="#">Indicadores</a>
                            </div>
                            </div>
                        </div>    
                        </li>
                    
                                    <li><a class="hover:text-black text-lg uppercase" href="/calidad">Calidad</a></li>
                                    <li><a class="hover:text-black text-lg uppercase" href="/mantenimiento">Mantenimiento</a></li>
                                    <li><a class="hover:text-black text-lg uppercase" href="/empleados">Empleados</a></li>
                                    </ul>

                                    <a  class="font-medium text-neutral-100" 
                                    href="{{ route('posts.index', auth()->user()->username) }}">
                                    USUARIO:
                                        <span class="font-medium space-x-2 hover:text-black"> 
                                            {{ auth()->user()->username }}
                                        </span>
                                </a>
                            
                                <form class="space-x-4" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="font-semibold text-white uppercase hover:text-black">
                                        Cerrar sesión
                                    </button>
                                </form>
                                    
                                    
                                </div>
                            </nav>
                        </section>
    </header>
    
    <body class="bg-gray-300">
        <div class="w-screen">
        
            <div>

                <h1 class="mt-14 ml-20 mb-4 text-5xl font-extrabold leading-none tracking-tight text-gray-900">PLAN <mark class="px-2 text-white bg-red-700 rounded">Producción Linea</mark></h1>
          
                <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full mt-4 py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-center text-base font-light">
                        <thead
                            class="border-b bg-sky-900 text-white font-medium dark:border-neutral-500 dark:text-neutral-800">
                            <tr>
                            <th scope="col" class=" px-6 py-4">TERMOFORMADORA</th>
                            <th scope="col" class=" px-6 py-4">PRODUCTO</th>
                            <th scope="col" class=" px-6 py-4">CANTIDAD</th>
                            <th scope="col" class=" px-6 py-4">SUAJE</th>
                            <th scope="col" class=" px-6 py-4">CORTE</th>
                            <th scope="col" class=" px-6 py-4">MATERIAL</th>
                            <th scope="col" class=" px-6 py-4">CAJA</th>
                            <th scope="col" class=" px-6 py-4">BOLSA</th>
                            <th scope="col" class=" px-6 py-4">CANTIDAD EMPAQUETADO</th>
                            <th scope="col" class=" px-6 py-4">FECHA INICIO</th>
                            <th scope="col" class=" px-6 py-4">FECHA TERMINO</th>
                            <th scope="col" class=" px-6 py-4">ESTATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($planproduccions as $planproduccion)
                                <tr class="border-b dark:border-neutral-500 bg-white">
                                <td class="whitespace-nowrap  px-6 py-4 font-semibold">{{ $planproduccion->termoformadora->id }}</td>
                                <td class="whitespace-nowrap  px-6 py-4 font-semibold">{{ $planproduccion->producto->nombre }}</td>
                                <td class="whitespace-nowrap  px-6 py-4 font-semibold">{{ $planproduccion->cantidad }}</td>
                                <td class="whitespace-nowrap  px-6 py-4 font-semibold">{{ $planproduccion->producto->suaje->codigo }}</td>
                                <td class="whitespace-nowrap  px-6 py-4 font-semibold">{{ $planproduccion->producto->suaje->corte->nombre }}</td>
                                <td class="whitespace-nowrap  px-6 py-4 font-semibold">{{ $planproduccion->producto->materiaprima->descripcion }}</td>
                                <td class="whitespace-nowrap  px-6 py-4 font-semibold">{{ $planproduccion->producto->caja->nombre }}</td>
                                <td class="whitespace-nowrap  px-6 py-4 font-semibold">{{ $planproduccion->producto->bolsa->nombre }}</td>
                                <td class="whitespace-nowrap  px-6 py-4 font-semibold">{{ $planproduccion->cantidad_empaquetado }}</td>
                                <td class="whitespace-nowrap  px-6 py-4 font-semibold">{{ $planproduccion->fecha_inicio }}</td>
                                <td class="whitespace-nowrap  px-6 py-4 font-semibold">{{ $planproduccion->fecha_termino}}</td>
                                 @switch(true)
                                    @case($planproduccion->estatus == 'Completado') 
                                        <td class="whitespace-nowrap  px-6 py-4 font-semibold bg-green-700 text-white">COMPLETADO</td>
                                    @break

                                    @case($planproduccion->estatus == 'Problemas') 
                                        <td class="whitespace-nowrap  px-6 py-4 font-semibold bg-red-600 text-white">PROBLEMAS</td>
                                    @break

                                    @case($planproduccion->estatus == 'Pausado') 
                                        <td class="whitespace-nowrap  px-6 py-4 font-semibold bg-orange-600 text-white">PAUSADO</td>
                                    @break

                                    @case($planproduccion->estatus == 'Proceso') 
                                        <td class="whitespace-nowrap  px-6 py-4 font-semibold bg-gray-600 text-white">EN PROCESO</td>
                                    @endswitch
                                </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>