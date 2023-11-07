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
        <title>Sistema RC Tools - Prueba</title>
    </head>
    
    <header>
    @auth 
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
                            <a class="block px-4 py-2 mt-2 text-base text-black font-semibold  rounded-lg hover:bg-slate-300 uppercase" href="/planproduccion">Plan de producción</a>
                            <a class="block px-4 py-2 mt-2 text-base text-black font-semibold  rounded-lg hover:bg-slate-300 uppercase" href="/registroproduccion">Registro de producción</a>
                            <a class="block px-4 py-2 mt-2 text-base text-black font-semibold  rounded-lg hover:bg-slate-300 uppercase" href="/almacenprovisional">Almacen provisional</a>
                            <a class="block px-4 py-2 mt-2 text-base text-black font-semibold  rounded-lg hover:bg-slate-300 uppercase" href="/suajemodelos">Suajes</a>
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
                @endauth
    </header>
    
    <body class="bg-gray-300">
        <div class="w-screen h-screen bg-gray-300">
            <div class="bg-gray-300">
                <p>.</p>
                <h1 class="mt-6 ml-20 mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">REGISTRO<mark class="px-2 text-white bg-red-700 rounded ml-3">Suajes</mark></h1>
            </div>
        <div>

        <div class="ml-5 mt-12 mr-40 flex flex-col items-end">
                <a href="suajemodelos/create" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-[#4285F4]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#4285F4]/55 mr-2 mb-2">
                    <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M.188 5H5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707c-.358.362-.617.81-.753 1.3C.148 5.011.166 5 .188 5ZM14 8a6 6 0 1 0 0 12 6 6 0 0 0 0-12Zm2 7h-1v1a1 1 0 0 1-2 0v-1h-1a1 1 0 0 1 0-2h1v-1a1 1 0 0 1 2 0v1h1a1 1 0 0 1 0 2Z"/>
                        <path d="M6 14a7.969 7.969 0 0 1 10-7.737V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H.188A.909.909 0 0 1 0 6.962V18a1.969 1.969 0 0 0 1.933 2h6.793A7.976 7.976 0 0 1 6 14Z"/>
                    </svg>
                    <span class="ml-2">CREAR NUEVO REGISTRO</span>
                <a>
            </div>
        <div class="overflow-x-auto w-11/12  mt-4 ml-20 shadow-md sm:rounded-lg flex flex-col items-center">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-black bg-amber-300 uppercase  dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-4">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                           CODIGO 
                        </th>
                        <th scope="col" class="px-6 py-3">
                           ACTIVO
                        </th>
                        <th scope="col" class="px-6 py-3">
                            COMENTARIOS
                        </th>
                        <th scope="col" class="px-6 py-3">
                            ESTATUS
                        </th>
                        <th scope="col" class="px-6 py-3">
                            ACCION
                        </th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ( $suajemodelos as $suajemodelo )
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 uppercase">
                            <th scope="row" class="px-6 py-4 font-bold text-gray-700  whitespace-nowrap dark:text-white">{{ $suajemodelo->id }} </th>
                            <td scope="row" class="px-6 py-4 font-bold text-gray-700  whitespace-nowrap dark:text-white">{{ $suajemodelo->codigo}}</td>
                            <td scope="row" class="px-6 py-4 font-bold text-gray-700 whitespace-nowrap dark:text-white">{{ $suajemodelo->activo}}</td>
                            <td scope="row" class="px-6 py-4 font-bold text-gray-700 whitespace-nowrap dark:text-white">{{ $suajemodelo->comentarios}}</td>
                            @switch(true)
                                @case($suajemodelo->estatus == 'DISPONIBLE') 
                                <td scope="row" class="px-6 py-4 font-bold text-gray-700  whitespace-nowrap  bg-green-200"> {{ $suajemodelo->estatus}}</td> 
                                 @break

                                 @case($suajemodelo->estatus == 'OCUPADO') 
                                 <td scope="row" class="px-6 py-4 font-bold text-gray-700  whitespace-nowrap dark:text-white bg-red-200"> {{ $suajemodelo->estatus}}</td> 
                                 @break

                                 @case($suajemodelo->estatus == 'DAÑADO') 
                                 <td scope="row" class="px-6 py-4 font-bold text-gray-700  whitespace-nowrap dark:text-white bg-orange-200"> {{ $suajemodelo->estatus}}</td> 
                                 @break

                                 @case($suajemodelo->estatus == 'OBSOLETO') 
                                 <td scope="row" class="px-6 py-4 font-bold text-gray-700  whitespace-nowrap dark:text-white bg-gray-200"> {{ $suajemodelo->estatus}}</td> 
                                 @endswitch
    
                            <td>
                                <form action="{{ route ('suajemodelos.destroy',$suajemodelo->id)}}" method="POST">
                                <a href="/suajemodelos/{{ $suajemodelo->id }}/edit" class="text-white ml-4 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2">
                                    EDITAR
                                </a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="focus:outline-none mt-2 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 uppercase dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- <div class="w-screen h-20 bg-black flex flex-col items-center ">
            <form method="get" action="www.facebook.com" class="mt-2">
                    <button
                        type="submit"
                        href="www.facebook.com"
                        data-te-ripple-init
                        data-te-ripple-color="light"
                        class="mb-2 inline-block rounded align-center px-6 py-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg"
                        style="background-color: #1877f2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                        </svg>
                    </button>
            </form>
             <p class="text-center text-white">Norte 11 1129, Ciudad industrial de Celaya, 38010, teléfono: 461-216-0470</p>
        </div>  -->
    </body>
</html>
 