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
        <title>RC Tools - Crear registro</title>
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
                    <h1 class="mt-20 ml-24 mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 ">CREAR NUEVO REGISTRO<mark class="px-2 text-white bg-red-700 rounded ml-3">Termo formado</mark></h1>
                </div>
                <div class="ml-48 flex flex-col items-center">
                    <a href="/registrotermoformado" class="text-black mt-7 ml-20 hover:text-white bg-gray-200 shadow hover:bg-gray-500 focus:outline-none focus:ring-[#4285F4]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#4285F4]/55 mr-2 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                        </svg>
                        <span class="hover:text-white ml-2">REGISTROS TERMO FORMADO</span>
                    <a>
                </div>
                
                    <div class="w-3/5 h-2/3 mt-4  ml-20 bg-white p-6 rounded-lg shadow-xl ">
                        <form action="/registrotermoformado" method="POST">
                            @csrf

                            <div class="flex">
                                <div class="mb-5 w-3/4">
                                    <label for="empleado_id" class="mb-2 block uppercase text-gray-700 font-bold">
                                        Empleado ID
                                    </label>
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
                                </div>
                                <div class="mb-5 ml-4 w-1/4">
                                    <label for="maquina" class="mb-2 block uppercase text-gray-700 font-bold">
                                        Maquina
                                    </label>
                                    <select
                                        id="maquina"
                                        name="maquina" 
                                        type="selected"
                                        class="border-2 font-medium text-gray-500 p-3 w-full rounded-lg @error('maquina') border-red-500
                                        @enderror"
                                        value="{{ old('maquina') }}"
                                    >
                                    <option selected>Seleccione una opción</option>
                                    <option value="termoformadora 1">Termoformadora 1</option>
                                    <option value="termoformadora 2">Termoformadora 2</option>
                                    <option value="termoformadora 3">Termoformadora 3</option>
                                    <option value="termoformadora 4">Termoformadora 4</option>
                                    <option value="termoformadora 5">Termoformadora 5</option>
                                    </select>
                                    @error('maquina')
                                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-5 w-3/4 ml-4">
                                    <label for="hora" class="mb-2 block uppercase text-gray-700 font-bold">
                                        Hora
                                    </label>
                                    <input
                                        id="hora"
                                        name="hora" 
                                        type="text"
                                        placeholder="Escriba la hora de registro"
                                        class="border-2 font-medium text-gray-500 p-3 w-full rounded-lg @error('hora') border-red-500
                                        @enderror"
                                        value="{{ old('hora') }}"
                                    />
                                    @error('hora')
                                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-5 w-1/4 ml-4">
                                    <label for="fecha" class="mb-2 block uppercase text-gray-700 font-bold">
                                        Fecha 
                                    </label>
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
                                </div>
                            </div>
                            <div class="flex">
                                <div class="mb-5 w-1/4">
                                    <label for="turno" class="mb-2 block uppercase text-gray-700 font-bold">
                                        Turno
                                    </label>
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
                                </div>
                                <div class="mb-5 ml-4 w-2/4">
                                    <label for="producto" class="mb-2 block uppercase text-gray-700 font-bold">
                                        Producto
                                    </label>
                                    <input
                                        id="producto"
                                        name="producto" 
                                        type="text"
                                        placeholder="Escriba el nombre del producto"
                                        class="border-2 ont-medium text-gray-500 p-3 w-full rounded-lg @error('producto') border-red-500
                                        @enderror"
                                        value="{{ old('producto') }}"
                                    />
                                    @error('producto')
                                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-5 ml-4 w-1/4">
                                    <label for="piezas_buenas" class="mb-2 block uppercase text-gray-700 font-bold">
                                        Piezas buenas
                                    </label>
                                    <input
                                        id="piezas_buenas"
                                        name="piezas_buenas" 
                                        type="text"
                                        placeholder="Numero de piezas buenas"
                                        class="border-2 ont-medium text-gray-500 p-3 w-full rounded-lg @error('piezas_buenas') border-red-500
                                        @enderror"
                                        value="{{ old('piezas_buenas') }}"
                                    />
                                    @error('piezas_buenas')
                                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex">
                                <div class="mb-5 w-1/4">
                                    <label for="piezas_malas" class="mb-2 block uppercase text-gray-700 font-bold">
                                        Piezas malas
                                    </label>
                                    <input
                                        id="piezas_malas"
                                        name="piezas_malas" 
                                        type="text"
                                        placeholder="Numero de piezas malas"
                                        class="border-2 ont-medium text-gray-500 p-3 w-full rounded-lg @error('piezas_malas') border-red-500
                                        @enderror"
                                        value="{{ old('piezas_malas') }}"
                                    />
                                    @error('piezas_malas')
                                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                                    @enderror
                                </div>
                                    <div class="ml-4 mb-5 w-1/4">
                                        <label for="piezas_malas_nuevo" class="mb-2 block uppercase text-gray-700 font-bold">
                                            Piezas malas / molde - materia 
                                        </label>
                                        <input
                                            id="piezas_malas_nuevo"
                                            name="piezas_malas_nuevo" 
                                            type="text"
                                            placeholder="Numero de piezas malas por molde nuevo o materia prima"
                                            class="border-2 ont-medium text-gray-500 p-3 w-full rounded-lg @error('piezas_malas_nuevo') border-red-500
                                            @enderror"
                                            value="{{ old('piezas_malas_nuevo') }}"
                                        />
                                        @error('piezas_malas_nuevo')
                                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                                        @enderror
                                    </div>
                                <div class="mb-5 ml-4 w-1/4">
                                    <label for="tiempo_muerto_operador" class="mb-2 block uppercase text-gray-700 font-bold">
                                        Tiempo muerto operador 
                                    </label>
                                    <input
                                        id="tiempo_muerto_operador"
                                        name="tiempo_muerto_operador" 
                                        type="text"
                                        placeholder="Tiempo muerto operador"
                                        class="border-2 ont-medium text-gray-500 p-3 w-full rounded-lg @error('tiempo_muerto_operador') border-red-500
                                        @enderror"
                                        value="{{ old('tiempo_muerto_operador') }}"
                                    />
                                    @error('tiempo_muerto_operador')
                                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-5 ml-4 w-1/4">
                                    <label for="tiempo_muerto_mantenimiento" class="mb-2 block uppercase text-gray-700 font-bold">
                                        Tiempo muerto mantenimiento
                                    </label>
                                    <input
                                        id="tiempo_muerto_mantenimiento"
                                        name="tiempo_muerto_mantenimiento" 
                                        type="text"
                                        placeholder="Tiempo muerto mantenimiento"
                                        class="border-2 ont-medium text-gray-500 p-3 w-full rounded-lg @error('tiempo_muerto_mantenimiento') border-red-500
                                        @enderror"
                                        value="{{ old('tiempo_muerto_mantenimiento') }}"
                                    />
                                    @error('tiempo_muerto_mantenimiento')
                                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex">
                                <div class="mb-5  w-3/4">
                                    <label for="causa" class="mb-2 block uppercase text-gray-700 font-bold">
                                        Causa
                                    </label>
                                    <input
                                        id="causa"
                                        name="causa" 
                                        type="text"
                                        placeholder="Causas de tiempo muerto mantenimiento"
                                        class="border-2 ont-medium text-gray-500 p-3 w-full rounded-lg @error('causa') border-red-500
                                        @enderror"
                                        value="{{ old('causa') }}"
                                    />
                                    @error('causa')
                                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-5 ml-4 w-1/4">
                                    <label for="limpieza" class="mb-2 block uppercase text-gray-700 font-bold">
                                        Limpieza
                                    </label>
                                    <select
                                        id="limpieza"
                                        name="limpieza" 
                                        type="selected"
                                        class="border-2 ont-medium text-gray-500 p-3 w-full rounded-lg @error('limpieza') border-red-500
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
                                </div>
                            </div>
                            <div class="flex flex-row justify-end">
                                <div class="mt-3">
                                    <a href="/registrotermoformado" class="text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:ring-red-400 font-bold uppercase rounded-lg px-20 py-3 mr-2 ">
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