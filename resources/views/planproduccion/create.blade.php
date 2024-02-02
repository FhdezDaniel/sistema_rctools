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
        <title>RC Tools - Crear Plan de Producción </title>
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
                        <li><a class="hover:text-black text-lg uppercase" href="/">Inicio</a></li>
                        
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
                            <a class="block px-4 py-2 mt-2 text-base text-black font-semibold  rounded-lg hover:bg-slate-300 uppercase" href="/catalogo">Catalogo</a>
                            </div>
                            </div>
                        </div>    
                        </li>
                    
                                    <li><a class="hover:text-black text-lg uppercase" href="/calidad">Calidad</a></li>
                                    <li><a class="hover:text-black text-lg uppercase" href="/mantenimiento">Mantenimiento</a></li>
                                    <li><a class="hover:text-black text-lg uppercase" href="/empleados">Empleados</a></li>
                                    </ul>
                                    
                                    
                                </div>
                            </nav>
                        </section>
    </header>

    <body class="bg-gray-300">
            <div>
                <h2 class="mt-20 ml-24 mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 ">NUEVO PLAN DE <mark class="px-2 text-white bg-red-700 rounded ml-3">Producción</mark></h2>
            </div>
            <div class="w-6/12 ml-20 bg-white p-6 rounded-lg shadow-xl flex flex-col">
                <form action="/planproduccion" method="POST">
                    @csrf
                    <div class="flex">

                            <div class="mb-5 w-3/5">
                                <label for="termoformadora_id" class="mb-2 block uppercase text-gray-700 font-bold">
                                   Termoformadora 
                                </label>
                                <select 
                                    id="termoformadora_id"
                                    name="termoformadora_id" 
                                    type="selected"
                                    class="border-2 font-medium text-gray-500 p-3 w-full rounded-lg @error('termoformadora_id') border-red-500
                                    @enderror"
                                    value="{{ old('termoformadora_id') }}"
                                >
                                    <option value="selected">Seleccione una opción</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                @error('termoformadora_id')
                                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="mb-5 ml-6 w-3/5">
                                <label for="producto_id" class="mb-2 block uppercase text-gray-700 font-bold">
                                    Producto 
                                </label>
                                <select 
                                    id="producto_id"
                                    name="producto_id" 
                                    type="selected"
                                    class="border-2 font-medium text-gray-500 p-3 w-full rounded-lg @error('producto_id') border-red-500
                                    @enderror"
                                    value="{{ old('producto_id') }}"
                                >
                                    <option value="selected">Seleccione una opción</option>
                                    <option value="1">TAX 120</option>
                                    <option value="2">PCK0054</option>
                                </select>
                                @error('producto_id')
                                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="flex">
                            <div class="mb-5  w-1/2">
                                <label for="cantidad" class="mb-2 block uppercase text-gray-700 font-bold">
                                    Cantidad
                                </label>
                                <input
                                    id="cantidad"
                                    name="cantidad" 
                                    type="text"
                                    placeholder="Cantidad de piezas a fabricar"
                                    class="border-2 font-medium text-gray-500 p-3 w-full rounded-lg @error('cantidad') border-red-500
                                    @enderror"
                                    value="{{ old('cantidad') }}"
                                />
                                @error('cantidad')
                                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-5 ml-6  w-1/2">
                                <label for="cantidad_empaquetado" class="mb-2 block uppercase text-gray-700 font-bold">
                                    Cantidad empaquetado
                                </label>
                                <input
                                    id="cantidad_empaquetado"
                                    name="cantidad_empaquetado" 
                                    type="text"
                                    placeholder="Cantidad de piezas a empaquetar"
                                    class="border-2 font-medium text-gray-500 p-3 w-full rounded-lg @error('cantidad_empaquetado') border-red-500
                                    @enderror"
                                    value="{{ old('cantidad_empaquetado') }}"
                                />
                                @error('cantidad_empaquetado')
                                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    <div class="flex">

                            
                    </div>
                    <div class="flex">
                            <div class="mb-5 w-3/5">
                                <label for="fecha_inicio" class="mb-2 block uppercase text-gray-700 font-bold">
                                    Fecha - Inicio
                                </label>
                                <input
                                    id="fecha_inicio"
                                    name="fecha_inicio" 
                                    type="date"
                                    placeholder="Fecha - inicio de producción"
                                    class="border-2 font-medium text-gray-500 p-3 w-full rounded-lg @error('fecha_inicio') border-red-500
                                    @enderror"
                                    value="{{ old('fecha_inicio') }}"
                                />
                                @error('fecha_inicio')
                                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-5 w-3/5 ml-6">
                                <label for="fecha_termino" class="mb-2 block uppercase text-gray-700 font-bold">
                                    Fecha - Termino
                                </label>
                                <input
                                    id="fecha_termino"
                                    name="fecha_termino" 
                                    type="date"
                                    placeholder="Fecha - termino de produccion"
                                    class="border-2 font-medium text-gray-500 p-3 w-full rounded-lg @error('fecha_termino') border-red-500
                                    @enderror"
                                    value="{{ old('fecha_termino') }}"
                                />
                                @error('termino')
                                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-5 w-3/5 ml-6">
                                <label for="estatus" class="mb-2 block uppercase text-gray-700 font-bold">
                                    Estatus
                                </label>
                                <select
                                    id="estatus"
                                    name="estatus" 
                                    type="selected"
                                    class="border-2 ont-medium uppercase text-gray-500 p-3 w-full rounded-lg @error('estatus') border-red-500
                                    @enderror"
                                    value="{{ old('estatus') }}"
                                >
                                    <option value="Completado">Completado</option>
                                    <option value="Proceso">En proceso</option>
                                    <option value="Pausado">Pausado</option>
                                    <option value="Problemas">Problemas</option>
                                 </select>
                                @error('estatus')
                                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                                @enderror
                            </div>
                    </div>
                    <div class="flex flex-row justify-end">
                        <div class="mt-3">
                            <a href="/planproduccion" class="text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:ring-red-400 font-bold uppercase rounded-lg px-20 py-3 mr-2 ">
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