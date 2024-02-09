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
        <title>RC Tools - Crear registro empaquetado</title>
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
                            <a class="block px-4 py-2 mt-2 text-base text-black font-semibold  rounded-lg hover:bg-slate-300 uppercase" href="/plan">Plan de producción</a>
                            <a class="block px-4 py-2 mt-2 text-base text-black font-semibold  rounded-lg hover:bg-slate-300 uppercase" href="/registrosproduccion">Registro de producción</a>
                            <a class="block px-4 py-2 mt-2 text-base text-black font-semibold  rounded-lg hover:bg-slate-300 uppercase" href="/almacenprovisional">Almacen provisional</a>
                            <a class="block px-4 py-2 mt-2 text-base text-black font-semibold  rounded-lg hover:bg-slate-300 uppercase" href="/suajes">Suajes</a>
                            <a class="block px-4 py-2 mt-2 text-base text-black font-semibold  rounded-lg hover:bg-slate-300 uppercase" href="#">Indicadores</a>
                            @role(['Admin'])
                            <a class="block px-4 py-2 mt-2 text-base text-black font-semibold  rounded-lg hover:bg-slate-300 uppercase" href="/catalogo">Catalogo</a>
                            @endrole
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
        <div class="bg-gray-300">
                    
                <h1 class="mt-20 ml-20 mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900">CREAR NUEVO REGISTRO<mark class="px-2 text-white bg-red-700 rounded ml-3">Empaquetado</mark></h1>
               
                
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                            <table class="min-w-full  mt-4 text-center text-sm font-light">
                                <thead
                                    class="border-b bg-sky-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900">
                                    <tr>
                                        <th scope="col" class=" px-6 py-4">Empleado ID</th>
                                        <th scope="col" class=" px-6 py-4">Maquina</th>
                                        <th scope="col" class=" px-6 py-4">Hora</th>
                                        <th scope="col" class=" px-6 py-4">Fecha</th>
                                        <th scope="col" class=" px-6 py-4">Turno</th>
                                        <th scope="col" class=" px-6 py-4">Linea</th>
                                        <th scope="col" class=" px-6 py-4">Producto</th>
                                        <th scope="col" class=" px-6 py-4">Piezas buenas</th>
                                        <th scope="col" class=" px-6 py-4">Piezas malas</th>
                                        <th scope="col" class=" px-6 py-4">Tiempo muerto operador</th>
                                        <th scope="col" class=" px-6 py-4">Causa</th>
                                        <th scope="col" class=" px-6 py-4">Limpieza</th>
                                    </tr>
                                </thead>
                            <form action="/registroempaquetado" method="POST">
                                @csrf
                            <tbody>
                                <tr class="border-b bg-white dark:border-neutral-500">
                                    <td class="whitespace-nowrap  px-6 py-4 font-medium">
                                        <input
                                            id="empleado_id"
                                            name="empleado_id"  
                                            type="text"
                                            placeholder="Escriba su id de empleado"
                                            class="border-2 font-medium text-gray-500 p-3 w-full rounded-lg @error('empleado_id') border-red-500
                                            @enderror"
                                            value="{{ old('empleado_id') }}"
                                        />
                                        @error('empleado_id')
                                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                                        @enderror
                                    </td>

                                    <td class="whitespace-nowrap px-6 py-4">
                                        <select
                                            id="maquina"
                                            name="maquina" 
                                            type="selected"
                                            class="border-2 font-medium text-gray-500 p-3 w-full rounded-lg @error('maquina') border-red-500
                                            @enderror"
                                            value="{{ old('maquina') }}"
                                            >
                                            <option selected>Seleccione una opción</option>
                                            <option value="Empaquetado 1">Empaquetado 1</option>
                                            <option value="Empaquetado 2">Empaquetado 2</option>
                                            <option value="Empaquetado 3">Empaquetado 3</option>
                                            <option value="Empaquetado 4">Empaquetado 4</option>
                                            <option value="Empaquetado 5">Empaquetado 5</option>
                                        </select>
                                        @error('maquina')
                                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                                        @enderror
                                    </td>

                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <input
                                            id="hora"
                                            name="hora" 
                                            type="text"
                                            placeholder="Escriba la hora de registro"
                                            class="font-medium border-2 text-gray-500 p-3 w-full rounded-lg @error('hora') border-red-500
                                            @enderror"
                                            value="{{ old('hora') }}"
                                            />
                                            @error('hora')
                                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                                            @enderror
                                    </td>

                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <input
                                            id="fecha"                        
                                            name="fecha" 
                                            type="date"
                                            placeholder="Fecha - inicio de producción"
                                            class="border-2 font-medium text-gray-500 p-3 w-full rounded-lg @error('fecha') border-red-500
                                            @enderror"
                                            value="{{ old('fecha') }}"
                                            />
                                            @error('fecha')
                                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                                            @enderror
                                    </td>

                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <select
                                            id="turno"
                                            name="turno" 
                                            type="selected"
                                            class="border-2 font-medium text-gray-500 p-3 w-full rounded-lg @error('turno') border-red-500
                                            @enderror"
                                            value="{{ old('turno') }}"
                                            >
                                            <option selected>Seleccione una opción</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    
                                        </select>
                                            @error('estatus')
                                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                                            @enderror
                                    </td>

                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <select
                                            id="linea"
                                            name="linea" 
                                            type="selected"
                                            class="border-2 font-medium text-gray-500 p-3 w-full rounded-lg @error('maquina') border-red-500
                                            @enderror"
                                            value="{{ old('linea') }}"
                                        >
                                        <option selected>Seleccione una opción</option>
                                        <option value="LINEA 1">LINEA 1</option>
                                        <option value="LINEA 2">LINEA 2</option>
                                        <option value="LINEA 3">LINEA 3</option>
                                        <option value="LINEA 4">LINEA 4</option>
                                        <option value="LINEA 5">LINEA 5</option>
                                        </select>
                                            @error('linea')
                                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                                            @enderror
                                    </td>

                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <select 
                                            id="producto_id"
                                            name="producto_id" 
                                            type="selected"
                                            class="border-2 font-medium text-gray-500 p-3 w-full rounded-lg @error('producto_id') border-red-500
                                            @enderror"
                                            value="{{ old('producto_id') }}"
                                        >
                                            <option value="selected">Seleccione una opción</option>
                                            <option value="1">FRIGOCEL</option>
                                            <option value="2">PCK0054</option>
                                        </select>
                                            @error('producto_id')
                                                p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                                            @enderror
                                    </td>

                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <input
                                            id="cajas_rechazadas"
                                            name="cajas_rechazadas" 
                                            type="text"
                                            placeholder="Numero total de cajas rechazadas"
                                            class="border-2 font-medium text-gray-500 p-3 w-full rounded-lg @error('cajas_rechazadas') border-red-500
                                            @enderror"
                                            value="{{ old('cajas_rechazadas') }}"
                                        />
                                            @error('cajas_rechazadas')
                                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                                            @enderror
                                    </td>

                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <input
                                            id="total_cajas"
                                            name="total_cajas" 
                                            type="text"
                                            placeholder="Numero total de cajas"
                                            class="border-2 font-medium text-gray-500 p-3 w-full rounded-lg @error('total_cajas') border-red-500
                                            @enderror"
                                            value="{{ old('total_cajas') }}"
                                        />
                                            @error('total_cajas')
                                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                                            @enderror
                                    </td>
              
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <input
                                            id="tiempo_muerto_operador"
                                            name="tiempo_muerto_operador"
                                            type="text"
                                            placeholder="Tiempo muerto operador"
                                            class="border-2 font-medium text-gray-500 p-3 w-full rounded-lg @error('tiempo_muerto_operador') border-red-500
                                            @enderror"
                                            value="{{ old('tiempo_muerto_operador') }}"
                                        />
                                        @error('tiempo_muerto_operador')
                                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                                        @enderror
                                    </td>
            
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <input
                                            id="causa"
                                            name="causa" 
                                            type="text"
                                            placeholder="Causas de tiempo muerto mantenimiento"
                                            class="border-2 font-medium text-gray-500 p-3 w-full rounded-lg @error('causa') border-red-500
                                            @enderror"
                                            value="{{ old('causa') }}"
                                        />
                                            @error('causa')
                                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                                            @enderror
                                    </td>

                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <select
                                            id="limpieza"
                                            name="limpieza" 
                                            type="selected"
                                            class="border-2 font-medium text-gray-500 p-3 w-full rounded-lg @error('limpieza') border-red-500
                                            @enderror"
                                            value="{{ old('limpieza') }}"
                                        >
                                            <option selected>Seleccione una opción</option>
                                            <option value="100%">Excelente</option>
                                            <option value="90%">Bueno</option>
                                            <option value="75%">Regular</option>
                                            <option value="50%">Pesimo</option>
                                            <option value="0%">No limpio</option>
                                        </select>
                                            @error('limpieza')
                                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                                            @enderror
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                            <div class="flex flex-row justify-end mt-4">
                                <div class="mt-3">
                                    <a href="/registroempaquetado" class="text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:ring-red-400 font-bold uppercase rounded-lg px-20 py-3 mr-2 ">
                                        Cancelar
                                    </a>
                                </div>
                                <div class="">
                                    <input 
                                        type="submit"
                                        value="Crear registro"
                                        class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                                        uppercase font-bold w-60 p-3 text-white rounded-lg"
                                    />
                                </div>
                            </div>            
                            </form>
        </div>        
    </body>
</html>