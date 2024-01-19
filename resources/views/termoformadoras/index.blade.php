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
        <div class="w-screen">
            
            <div>   
                
                <h1 class="mt-14 ml-20 mb-4 text-5xl font-extrabold leading-none tracking-tight text-gray-900">PLAN <mark class="px-2 text-white bg-red-700 rounded">Producción</mark></h1>
            
                <div class="ml-5 mt-12 mr-60 flex flex-row justify-end">
                    @role(['Admin','GerenteProduccion'])
                    <a href="termoformadoras/create" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-[#4285F4]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#4285F4]/55 mr-2 mb-2">
                        <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M.188 5H5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707c-.358.362-.617.81-.753 1.3C.148 5.011.166 5 .188 5ZM14 8a6 6 0 1 0 0 12 6 6 0 0 0 0-12Zm2 7h-1v1a1 1 0 0 1-2 0v-1h-1a1 1 0 0 1 0-2h1v-1a1 1 0 0 1 2 0v1h1a1 1 0 0 1 0 2Z"/>
                            <path d="M6 14a7.969 7.969 0 0 1 10-7.737V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H.188A.909.909 0 0 1 0 6.962V18a1.969 1.969 0 0 0 1.933 2h6.793A7.976 7.976 0 0 1 6 14Z"/>
                        </svg>
                        <span class="ml-2">PLAN NUEVO TERMOFORMADORAS</span>
                    </a> 
                    @endrole
                    <a href="/planproduccion" class="text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-[#4285F4]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#4285F4]/55 mr-2 mb-2">
                        <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
	                        <path d="M13.606 3.748V2.53a1.542 1.542 0 0 0-.872-1.431 1.352 1.352 0 0 0-1.472.2L6.155 5.552a1.6 1.6 0 0 0 0 2.415l5.108 4.25a1.355 1.355 0 0 0 1.472.2 1.546 1.546 0 0 0 .872-1.428v-1.09a4.721 4.721 0 0 1 3.7 2.868 1.186 1.186 0 0 0 1.08.73 1.225 1.225 0 0 0 1.213-1.286v-1.33a6.923 6.923 0 0 0-5.994-7.133Z"/>
                            <path d="m2.434 6.693 5.517-4.95A1 1 0 0 0 6.615.257L1.1 5.205a2.051 2.051 0 0 0-.01 3.035l5.61 5.088a1 1 0 1 0 1.344-1.482l-5.61-5.153Z"/>
                        </svg>
                    <span class="ml-2">REGRESAR</span>
                    </a>       
                </div>
                <div>
                <h1 class="mb-4 ml-20  text-4xl font-bold leading-none tracking-tight text-gray-900">Termo<mark class="ml-2 px-2 text-white bg-red-700 rounded">Formadoras</mark></h1>
                <div class="ml-20 w-10/12 overflow-x-auto shadow-md sm:rounded-lg">
                <table class="mt-4 w-full text-sm  text-left text-black">
                    <thead class="text-sm text-white uppercase bg-sky-900">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID 
                            </th>
                            <th scope="col" class="px-6 py-3">
                                TERMOFORMADORA
                            </th>
                            <th scope="col" class="px-6 py-3">
                                PRODUCTO
                            </th>
                            <th scope="col" class="px-6 py-3">
                                SUAJE_ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                CANTIDAD
                            </th>
                            <th scope="col" class="px-6 py-3">
                                CORTE
                            </th>
                            <th scope="col" class="px-6 py-3">
                                MATERIAL
                            </th>
                            <th scope="col" class="px-6 py-3">
                                FECHA - INICIO
                            </th>
                            <th scope="col" class="px-6 py-3">
                                FECHA - TERMINO 
                            </th>
                            <th scope="col" class="px-6 py-3">
                                ESTATUS 
                            </th>
                            @role(['Admin','GerenteProduccion'])
                            <th scope="col" class="px-6 py-3">
                                ACCIÓN
                            </th>
                            @endrole
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($termoformadoras as $termoformadora)
                            <tr class="bg-white border-b uppercase">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap dark:text-white">{{ $termoformadora->id }}</th>
                                <td scope="row" class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap dark:text-white">{{ $termoformadora->termoformadora }}</td>
                                <td scope="row" class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap dark:text-white">{{ $termoformadora->producto }}</td>
                                <td scope="row" class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap dark:text-white">{{ $termoformadora->suaje_id }}</td>
                                <td scope="row" class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap dark:text-white">{{ $termoformadora->cantidad }}</td>
                                <td scope="row" class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap dark:text-white">{{ $termoformadora->corte }}</td>
                                <td scope="row" class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap dark:text-white">{{ $termoformadora->material }}</td>
                                <td scope="row" class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap dark:text-white">{{ $termoformadora->inicio }}</td>
                                <td scope="row" class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap dark:text-white">{{ $termoformadora->termino}}</td>
                                @switch(true)
                                        @case($termoformadora->estatus == 'Terminado') 
                                        <td scope="row" class="px-6 py-4 font-bold text-green-600  whitespace-nowrap  bg-white"> {{ $termoformadora->estatus}}</td> 
                                        @break

                                        @case($termoformadora->estatus == 'Problemas') 
                                        <td scope="row" class="px-6 py-4 font-bold text-red-600  whitespace-nowrap dark:text-white bg-white"> {{ $termoformadora->estatus}}</td> 
                                        @break

                                        @case($termoformadora->estatus == 'Pausado') 
                                        <td scope="row" class="px-6 py-4 font-bold text-orange-600  whitespace-nowrap dark:text-white bg-white"> {{ $termoformadora->estatus}}</td> 
                                        @break

                                        @case($termoformadora->estatus == 'Proceso') 
                                        <td scope="row" class="px-6 py-4 font-bold text-gray-600  whitespace-nowrap dark:text-white bg-white"> {{ $termoformadora->estatus}}</td> 
                                        @endswitch
                                <td>
                                @role(['Admin','GerenteProduccion'])
                                    <form action="{{ route ('termoformadoras.destroy', $termoformadora->id) }}" method="POST">
                                    <a href="/termoformadoras/{{ $termoformadora->id }}/edit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2">
                                        Editar 
                                    </a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="focus:outline-none mt-2 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Eliminar</button>
                                    </form>
                                @endrole
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>