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
        <title>RC Tools - Crear nuevo registro de producto</title>
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
                            <a class="block px-4 py-2 mt-2 text-base text-black font-semibold  rounded-lg hover:bg-slate-300 uppercase" href="/catalogo">Catalogo</a>
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
                <h2 class="mt-10 ml-20 mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 ">CREAR REGISTRO de<mark class="px-2 text-white bg-red-700 rounded ml-3">PRODUCTO</mark></h2>
            </div>
            <div class="w-4/12 h-2/3  ml-20 bg-white p-6 rounded-lg shadow-xl ">
                <form action="/productos" method="POST">
                    @csrf
                    <div class="mb-5">
                        <label for="clave" class="mb-2 block uppercase text-gray-700 font-bold">
                            Clave
                        </label>
                        <input
                            id="clave"
                            name="clave" 
                            type="text"
                            placeholder="Escriba la clave del producto"
                            class="border-2 ont-medium text-gray-500 p-3 w-full rounded-lg @error('clave') border-red-500
                            @enderror"
                            value="{{ old('clave') }}"
                        />
                        @error('clave')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="nombre" class="mb-2 block uppercase text-gray-700 font-bold">
                            Nombre
                        </label>
                           <input
                                id="nombre"
                                name="nombre" 
                                type="text"
                                placeholder="Escriba el nombre del producto"
                                class="border-2 font-medium text-gray-500 p-3 w-full rounded-lg @error('nombre') border-red-500
                                @enderror"
                                value="{{ old('nombre') }}"
                            />
                            @error('nombre')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                            @enderror
                    </div>

                    <div class="mb-5">
                        <label for="suaje_id" class="mb-2 block uppercase text-gray-700 font-bold">
                            Suaje
                        </label>
                        <select
                            id="suaje_id"
                            name="suaje_id" 
                            type="selected"
                            class="border-2 ont-medium uppercase text-gray-500 p-3 w-full rounded-lg @error('suaje_id') border-red-500
                            @enderror"
                            value="{{ old('suaje_id') }}"
                        >
                        <option value="selected">Seleccione una opcion</option>
                        <option value="1">S10</option>
                        <option value="2">T15</option>
                        <option value="3">3X3</option>
                        </select>
                        @error('suaje_id')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="materiaprima_id" class="mb-2 block uppercase text-gray-700 font-bold">
                            Materia prima 
                        </label>
                        <select
                            id="materiaprima_id"
                            name="materiaprima_id" 
                            type="selected"
                            class="border-2 ont-medium uppercase text-gray-500 p-3 w-full rounded-lg @error('materiaprima_id') border-red-500
                            @enderror"
                            value="{{ old('materiaprima_id') }}"
                        >
                        <option value="selected">Seleccione una opcion</option>
                        <option value="1">TAX 120</option>
                        <option value="2">FRIGOCEL</option>
                        <option value="3">AYE 128</option>
                        </select>
                        @error('materiaprima_id')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="caja_id" class="mb-2 block uppercase text-gray-700 font-bold">
                            Caja 
                        </label>
                        <select
                            id="caja_id"
                            name="caja_id" 
                            type="selected"
                            class="border-2 ont-medium uppercase text-gray-500 p-3 w-full rounded-lg @error('caja_id') border-red-500
                            @enderror"
                            value="{{ old('caja_id') }}"
                        >
                        <option value="selected">Seleccione una opcion</option>
                        <option value="1">FORD</option>
                        <option value="2">HITACHI</option>
                        <option value="3">HONDA</option>
                        <option value="4">TK R002 (Hamburguesa)</option>
                        <option value="5">INVERNADERO</option>
                        <option value="6">JAE</option>
                        </select>
                        @error('caja_id')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="bolsa_id" class="mb-2 block uppercase text-gray-700 font-bold">
                            Bolsa
                        </label>
                        <select
                            id="bolsa_id"
                            name="bolsa_id" 
                            type="selected"
                            class="border-2 ont-medium uppercase text-gray-500 p-3 w-full rounded-lg @error('bolsa_id') border-red-500
                            @enderror"
                            value="{{ old('bolsa_id') }}"
                        >
                        <option value="selected">Seleccione una opcion</option>
                        <option value="1">SIIX</option>
                        <option value="2">CHICA</option>
                        <option value="3">GRANDE</option>
                        </select>
                        @error('bolsa_id')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="fecha_registro" class="mb-2 block uppercase text-gray-700 font-bold">
                            Fecha Registro
                        </label>
                           <input
                                id="fecha_registro"
                                name="fecha_registro" 
                                type="date"
                                placeholder="Fecha registro de corte"
                                class="border-2 font-medium text-gray-500 p-3 w-full rounded-lg @error('fecha_registro') border-red-500
                                @enderror"
                                value="{{ old('fecha_registro') }}"
                            />
                            @error('fecha_registro')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                            @enderror
                    </div>


                    <div class="mb-2">
                        <a href="/productos" class="text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:ring-red-400 font-bold uppercase rounded-lg  px-20 py-3 mr-3 ">
                            Cancelar
                        </a>
                        <input 
                            type="submit"
                            value="Crear registro"
                            class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                            uppercase  font-bold w-60 p-3 text-white rounded-lg"
                        />
                    </div>
                </form>
            </div>
            <div>
                
            </div>
    </body>
</html> 
