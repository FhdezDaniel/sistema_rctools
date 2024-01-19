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
        <title>RC Tools - Crear nuevo empleado</title>
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
                    <h1 class="mt-6 ml-20 mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">REGISTRO<mark class="px-2 text-white bg-red-700 rounded ml-3">empleado</mark></h1>
                </div>
                <div class=" mt-12 ml-36 flex flex-col items-center">
                    
                </div>
                    <div class="w-3/5 h-2/3 mt-4  ml-20 bg-white p-6 rounded-lg shadow-xl ">
                        <form action="/empleados" method="POST">
                            @csrf
                            <div class="flex">
                                <div class="mb-5 ml-4 w-1/4">
                                    <label for="numempleado" class="mb-2 block uppercase text-gray-700 font-bold">
                                        Numero de empleado
                                    </label>
                                    <input
                                        id="numempleado"
                                        name="numempleado" 
                                        type="text"
                                        placeholder="Escriba el numero de empleado"
                                        class="border-2 ont-medium text-gray-500 p-3 w-full rounded-lg @error('nombreop') border-red-500
                                        @enderror"
                                        value="{{ old('numempleado') }}"
                                    />
                                    @error('numempleado')
                                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-5 ml-4 w-3/4">
                                    <label for="nombre" class="mb-2 block uppercase text-gray-700 font-bold">
                                        Nombre(s)
                                    </label>
                                    <input
                                        id="nombre"
                                        name="nombre" 
                                        type="text"
                                        placeholder="Escriba los nombres del empleado"
                                        class="border-2 ont-medium text-gray-500 p-3 w-full rounded-lg @error('nombre') border-red-500
                                        @enderror"
                                        value="{{ old('nombre') }}"
                                    />
                                    @error('nombre')
                                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex">
                                <div class="mb-5 ml-4 w-1/2">
                                    <label for="apepaterno" class="mb-2 block uppercase text-gray-700 font-bold">
                                        Apellido Paterno
                                    </label>
                                    <input
                                        id="apepaterno"
                                        name="apepaterno" 
                                        placeholder="Escriba apellido paterno"
                                        type="text"
                                        class="border-2 ont-medium text-gray-500 p-3 w-full rounded-lg @error('apepaterno') border-red-500
                                        @enderror"
                                        value="{{ old('apepaterno') }}"
                                    />
                                    @error('apepaterno')
                                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-5 ml-4 w-1/2">
                                    <label for="apematerno" class="mb-2 block uppercase text-gray-700 font-bold">
                                        Apellido Materno
                                    </label>
                                    <input
                                        id="apematerno"
                                        name="apematerno" 
                                        placeholder="Escriba apellido materno"
                                        type="text"
                                        class="border-2 ont-medium text-gray-500 p-3 w-full rounded-lg @error('apematerno') border-red-500
                                        @enderror"
                                        value="{{ old('apematerno') }}"
                                    />
                                    @error('apematerno')
                                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex">
                                <div class="mb-5 ml-4 w-1/4">
                                    <label for="puesto" class="mb-2 block uppercase text-gray-700 font-bold">
                                        Puesto
                                    </label>
                                    <input
                                        id="puesto"
                                        name="puesto" 
                                        placeholder="Puesto del empleado"
                                        type="text"
                                        class="border-2 ont-medium text-gray-500 p-3 w-full rounded-lg @error('puesto') border-red-500
                                        @enderror"
                                        value="{{ old('puesto') }}"
                                    />
                                    @error('puesto')
                                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-5 w-1/4 ml-4">
                                    <label for="fechanacimiento" class="mb-2 block uppercase text-gray-700 font-bold">
                                        Fecha Nacimiento
                                    </label>
                                    <input
                                        id="fechanacimiento"
                                        name="fechanacimiento" 
                                        type="date"
                                        placeholder="Fecha - nacimiento"
                                        class="border-2 font-medium text-gray-500 p-3 w-full rounded-lg @error('fechanacimiento') border-red-500
                                        @enderror"
                                        value="{{ old('fechanacimiento') }}"
                                    />
                                    @error('fechanacimiento')
                                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-5 w-1/4 ml-4">
                                    <label for="fechaingreso" class="mb-2 block uppercase text-gray-700 font-bold">
                                        Fecha de Ingreso
                                    </label>
                                    <input
                                        id="fechaingreso"
                                        name="fechaingreso" 
                                        type="date"
                                        placeholder="Fecha - ingreso"
                                        class="border-2 font-medium text-gray-500 p-3 w-full rounded-lg @error('fechaingreso') border-red-500
                                        @enderror"
                                        value="{{ old('fechaingreso') }}"
                                    />
                                    @error('fechaingreso')
                                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex">
                                <div class="mb-5 ml-4 w-3/4">
                                    <label for="correo" class="mb-2 block uppercase text-gray-700 font-bold">
                                        Correo
                                    </label>
                                    <input
                                        id="correo"
                                        name="correo" 
                                        type="text"
                                        placeholder="Escriba el correo electronico"
                                        class="border-2 ont-medium text-gray-500 p-3 w-full rounded-lg @error('correo') border-red-500
                                        @enderror"
                                        value="{{ old('correo') }}"
                                    />
                                    @error('correo')
                                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex flex-row justify-end">
                                <div class="mt-3">
                                    <a href="/empleados" class="text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:ring-red-400 font-bold uppercase rounded-lg px-20 py-3 mr-2 ">
                                        Cancelar
                                    </a>
                                </div>
                                <div class="">
                                    <input 
                                        type="submit"
                                        value="Crear nuevo registro"
                                        class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                                        uppercase font-bold w-60 p-3 text-white rounded-lg"
                                    />
                                </div>
                            </div>
                        </form>
                    </div>        
    </body>
</html>