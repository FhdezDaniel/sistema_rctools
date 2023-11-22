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
            <h2 class="mt-20 ml-20 mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 ">EDITAR REGISTRO<mark class="px-2 text-white bg-red-700 rounded ml-3">Inspeccion Y Barrenado</mark></h2>
        </div>
        <div class="w-3/5 h-2/3 mt-10 ml-20 bg-white p-6 rounded-lg shadow-xl">
            <form action="/registroinspeccionbarrenado/{{ $registroinspeccion->id }}" method="POST">
                @csrf
                @method('PUT')
                    <div class="flex">
                                <div class="mb-5 w-3/4">
                                    <label for="nombreop" class="mb-2 block uppercase text-gray-700 font-bold">
                                        Nombre operador
                                    </label>
                                    <input
                                        id="nombreop"
                                        name="nombreop" 
                                        type="text"
                                        placeholder="Escriba su nombre completo"
                                        class="border-2 ont-medium text-gray-500 p-3 w-full rounded-lg @error('nombreop') border-red-500
                                        @enderror"
                                        value="{{ $registroinspeccion->nombreop }}"
                                    />
                                    @error('nombreop')
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
                                        class="border-2 ont-medium text-gray-500 p-3 w-full rounded-lg @error('maquina') border-red-500
                                        @enderror"
                                        value="{{ $registroinspeccion->maquina }}"
                                    >
                                    
                                    <option value="Inspección 1">Inspección 1</option>
                                    <option value="Inspección 2">Inspección 2</option>
                                    <option value="Inspección 3">Inspección 3</option>
                                    <option value="Inspección 4">Inspección 4</option>
                                    <option value="Inspección 5">Inspección 5</option>    
                                    <option value="Barrenado 1">Barrenado 1</option>
                                    <option value="Barrenado 2">Barrenado 2</option>
                                    </select>
                                    @error('maquina')
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
                                        value="{{ $registroinspeccion->fecha }}"
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
                                        class="border-2 ont-medium text-gray-500 p-3 w-full rounded-lg @error('turno') border-red-500
                                        @enderror"
                                        value="{{ $registroinspeccion->turno }}"
                                    >
                                 
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
                                        value="{{ $registroinspeccion->producto }}"
                                    />
                                    @error('producto')
                                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-5 ml-4 w-1/4">
                                    <label for="totalpzs" class="mb-2 block uppercase text-gray-700 font-bold">
                                        Total de piezas 
                                    </label>
                                    <input
                                        id="totalpzs"
                                        name="totalpzs" 
                                        type="text"
                                        placeholder="Total de piezas"
                                        class="border-2 ont-medium text-gray-500 p-3 w-full rounded-lg @error('totalpzs') border-red-500
                                        @enderror"
                                        value="{{ $registroinspeccion->totalpzs }}"
                                    />
                                    @error('totalpzs')
                                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                                    @enderror
                                </div>
                    </div>
                    <div class="flex">
                                <div class="mb-5 w-1/4">
                                    <label for="pzsmalas" class="mb-2 block uppercase text-gray-700 font-bold">
                                        Piezas malas
                                    </label>
                                    <input
                                        id="pzsmalas"
                                        name="pzsmalas" 
                                        type="text"
                                        placeholder="Numero de piezas malas"
                                        class="border-2 ont-medium text-gray-500 p-3 w-full rounded-lg @error('pzsmalas') border-red-500
                                        @enderror"
                                        value="{{ $registroinspeccion->pzsmalas }}"
                                    />
                                    @error('pzsmalas')
                                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-5 ml-4 w-1/4">
                                    <label for="tiempoop" class="mb-2 block uppercase text-gray-700 font-bold">
                                        Tiempo muerto operador
                                    </label>
                                    <input
                                        id="tiempoop"
                                        name="tiempoop" 
                                        type="text"
                                        placeholder="Timepo muerto operador"
                                        class="border-2 ont-medium text-gray-500 p-3 w-full rounded-lg @error('tiempoop') border-red-500
                                        @enderror"
                                        value="{{ $registroinspeccion->tiempoop }}"
                                    />
                                    @error('tiempoop')
                                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-5 ml-4 w-1/4">
                                    <label for="tiempomtto" class="mb-2 block uppercase text-gray-700 font-bold">
                                        Tiempo muerto mto
                                    </label>
                                    <input
                                        id="tiempomtto"
                                        name="tiempomtto" 
                                        type="text"
                                        placeholder="Timepo muerto mantenimiento"
                                        class="border-2 ont-medium text-gray-500 p-3 w-full rounded-lg @error('tiempomtto') border-red-500
                                        @enderror"
                                        value="{{ $registroinspeccion->tiempomtto }}"
                                    />
                                    @error('tiempomtto')
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
                                        value="{{ $registroinspeccion->limpieza }}"
                                    >
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
                    <div class="mb-2 flex flex-row justify-end">
                        <a href="/registroinspeccionbarrenado" class="text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:ring-red-400 font-bold uppercase rounded-lg  px-20 py-3 mr-3 ">
                            Cancelar
                        </a>
                        <input 
                            type="submit"
                            value="Guardar"
                            class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                            uppercase  font-bold w-60 p-3 text-white rounded-lg"
                        />
                    </div>
            </form>
        </div>
    </body>
</html> 