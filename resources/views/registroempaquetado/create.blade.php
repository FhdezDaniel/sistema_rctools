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
                <div class="bg-gray-300">
                    <p>.</p>
                    <h1 class="mt-6 ml-20 mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">REGISTRO<mark class="px-2 text-white bg-red-700 rounded ml-3">Empaquetado</mark></h1>
                </div>
                <div class=" mt-12 ml-56 flex flex-col items-center">
                    <a href="/registroempaquetado" class="text-black mt-7 ml-20 hover:text-white bg-gray-200 shadow hover:bg-gray-500 focus:outline-none focus:ring-[#4285F4]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#4285F4]/55 mr-2 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                        </svg>
                        <span class="hover:text-white ml-2">REGISTROS EMPAQUETADO</span>
                    <a>
                </div>
                
                    <div class="w-3/5 h-2/3 mt-4  ml-20 bg-white p-6 rounded-lg shadow-xl ">
                        <form action="/registroempaquetado" method="POST">
                            @csrf

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
                                        value="{{ old('nombreop') }}"
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
                                        class="border-2 ont-medium text-gray-500 p-3 w-full rounded-lg @error('turno') border-red-500
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
                                <div class="mb-5 ml-4 w-1/4">
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
                                    <label for="cajasrechazadas" class="mb-2 block uppercase text-gray-700 font-bold">
                                        Cajas rechazadas
                                    </label>
                                    <input
                                        id="cajasrechazadas"
                                        name="cajasrechazadas" 
                                        type="text"
                                        placeholder="Numero de cajas rechazadas"
                                        class="border-2 ont-medium text-gray-500 p-3 w-full rounded-lg @error('cajasrechazadas') border-red-500
                                        @enderror"
                                        value="{{ old('cajasrechazadas') }}"
                                    />
                                    @error('cajasrechazadas')
                                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-5 ml-4  w-1/4">
                                    <label for="totalcajas" class="mb-2 block uppercase text-gray-700 font-bold">
                                        Total cajas
                                    </label>
                                    <input
                                        id="totalcajas"
                                        name="totalcajas" 
                                        type="text"
                                        placeholder="Numero dtotal de cajas"
                                        class="border-2 ont-medium text-gray-500 p-3 w-full rounded-lg @error('totalcajas') border-red-500
                                        @enderror"
                                        value="{{ old('totalcajas') }}"
                                    />
                                    @error('totalcajas')
                                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="flex">
                                <div class="mb-5  w-3/4">
                                    <label for="observaciones" class="mb-2 block uppercase text-gray-700 font-bold">
                                        Observaciones
                                    </label>
                                    <input
                                        id="observaciones"
                                        name="observaciones" 
                                        type="text"
                                        placeholder="Observaciones"
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
                                <div class="mb-2 flex-col flex items-end">
                                  <input 
                                  type="submit"
                                  value="Crear registro"
                                  class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                                  uppercase  font-bold w-60 p-3 text-white rounded-lg"
                                  />
                                </div>
                        </form>
                    </div>        
    </body>
</html>