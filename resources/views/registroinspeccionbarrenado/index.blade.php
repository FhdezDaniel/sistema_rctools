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
        <div>
            <h1 class="mt-14 ml-20 mb-4 text-6xl font-extrabold leading-none tracking-tight text-gray-900">REGISTRO<mark class="px-2 text-white bg-red-700 rounded ml-3">Inspección Y Barrenado</mark></h1>

            <div class="mt-12 mr-20 flex flex-col items-end">
                <a href="registroinspeccionbarrenado/create" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-[#4285F4]/50 font-medium rounded-lg text-sm px-3 py-2.5 text-center inline-flex items-center dark:focus:ring-[#4285F4]/55 mr-2 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>      
                    <span class="ml-2">NUEVO REGISTRO</span>
                </a> 
                <a href="/registroproduccion" class="text-white bg-orange-500 hover:bg-orange-600 focus:outline-none focus:ring-[#4285F4]/50 font-medium rounded-lg text-sm px-3 py-2.5 text-center inline-flex items-center dark:focus:ring-[#4285F4]/55 mr-2 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                    </svg>
                    <span class="ml-2">REGRESAR</span>
                </a>       
            </div>
            <div>
                <div class="ml-20 mt-4 w-11/12 overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-black uppercase bg-blue-300 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID 
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    NOMBRE DEL OPERADOR 
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    MAQUINA
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    FECHA
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    TURNO 
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    NOMBRE DEL PRODUCTO 
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    TOTAL DE PIEZAS 
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    PIEZAS MALAS
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    TIEMPO MUERTO OP
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    TIEMPO MUERTO MTTO
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    LIMPIEZA
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    ACCIÓN
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($registroinspeccions as $registroinspeccion)
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 uppercase">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap dark:text-white">{{ $registroinspeccion->id }}</th>
                                    <td scope="row" class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap dark:text-white">{{ $registroinspeccion->nombreop}}</td>
                                    <td scope="row" class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap dark:text-white">{{ $registroinspeccion->maquina}}</td>
                                    <td scope="row" class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap dark:text-white">{{ $registroinspeccion->fecha}}</td>
                                    <td scope="row" class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap dark:text-white">{{ $registroinspeccion->turno}}</td>
                                    <td scope="row" class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap dark:text-white">{{ $registroinspeccion->producto}}</td>
                                    <td scope="row" class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap dark:text-white">{{ $registroinspeccion->totalpzs}}</td>
                                    <td scope="row" class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap dark:text-white">{{ $registroinspeccion->pzsmalas}}</td>
                                    <td scope="row" class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap dark:text-white">{{ $registroinspeccion->tiempoop}}</td>
                                    <td scope="row" class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap dark:text-white">{{ $registroinspeccion->tiempomtto}}</td>
                                    <td scope="row" class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap dark:text-white">{{ $registroinspeccion->limpieza}}</td>
                                    
                                    <td>
                                        <form action="{{ route ('registroinspeccionbarrenado.destroy',$registroinspeccion->id)}}" method="POST">
                                            <a href="/registroinspeccionbarrenado/{{ $registroinspeccion->id }}/edit" class="text-white flex bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 mt-2 py-2.5 mr-2 w-16">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                                </svg>
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="focus:outline-none mt-2 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>