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
                    <li><a class="hover:text-black text-lg" href="/home">Inicio</a></li>
                    
                    <li class="hover:text-black text-lg">
                    <div @click.away="open = false" class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center text-lg font-sans font-medium rounded-lg">
                        <span>Producción</span>
                        <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-01"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                        <div class="px-2 py-2 bg-gray-200 rounded-md shadow dark-mode:bg-gray-800">
                            <a class="block px-4 py-2 mt-2 text-base font-semibold  rounded-lg hover:bg-slate-100" href="/produccion">Producción</a>
                            <a class="block px-4 py-2 mt-2 text-base font-semibold  rounded-lg hover:bg-slate-100" href="/planproduccion">Plan de producción</a>
                            <a class="block px-4 py-2 mt-2 text-base font-semibold  rounded-lg hover:bg-slate-100" href="/registroproduccion">Registro de producción</a>
                            <a class="block px-4 py-2 mt-2 text-base font-semibold  rounded-lg hover:bg-slate-100" href="/almacenprovisional">Almacen provisional</a>
                            <a class="block px-4 py-2 mt-2 text-base font-semibold  rounded-lg hover:bg-slate-100" href="/suajes">Suajes</a>
                            <a class="block px-4 py-2 mt-2 text-base font-semibold  rounded-lg hover:bg-slate-100" href="#">Indicadores</a>
                        </div>
                        </div>
                    </div>    
                    </li>
                
                                <li><a class="hover:text-black text-lg" href="/calidad">Calidad</a></li>
                                <li><a class="hover:text-black text-lg" href="/mantenimiento">Mantenimiento</a></li>
                                <li><a class="hover:text-black text-lg" href="/empleados">Empleados</a></li>
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
            <h2 class="mt-6 ml-20 mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 ">EDITAR REGISTRO<mark class="px-2 text-white bg-red-700 rounded ml-3">suajes</mark></h2>
        </div>
        <div class="w-4/12 h-2/3  ml-20 bg-white p-6 rounded-lg shadow-xl ">
            <form action="/suajes/{{ $suajes->id }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="modelo" class="mb-2 block uppercase text-gray-700 font-bold">
                        Modelo 
                    </label>
                    <input
                        id="modelo"
                        name="modelo" 
                        type="text"
                        placeholder="Escriba el modelo del suaje"
                        class="border-2 font-medium text-gray-500 p-3 w-full rounded-lg @error('modelo') border-red-500
                        @enderror"
                        value="{{ $suajes->modelo }}"
                    />
                    @error('modelo')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="cantidad" class="mb-2 block uppercase text-gray-700 font-bold">
                        Cantidad
                    </label>
                    <input
                        id="cantidad"
                        name="cantidad" 
                        type="text"
                        placeholder="Cantidad de suajes"
                        class="border-2 font-medium text-gray-500 p-3 w-full rounded-lg @error('cantidad') border-red-500
                        @enderror"
                        value="{{ $suajes->cantidad }}"
                    />
                    @error('cantidad')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="corte" class="mb-2 block uppercase text-gray-700 font-bold">
                        Corte
                    </label>
                    <input
                        id="corte"
                        name="corte" 
                        type="text"
                        placeholder="Escriba el corte del suaje"
                        class="border-2 font-medium text-gray-500 p-3 w-full rounded-lg @error('corte') border-red-500
                        @enderror"
                        value="{{ $suajes->corte }}"
                    />
                    @error('corte')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="estatus" class="mb-2 block uppercase text-gray-700 font-bold">
                        Estatus
                    </label>
                    <select id="estatus" class="border font-medium text-gray-500  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected>Selecciona una opción</option>
                        <option value="1">1</option>
                        <option value="0">0</option>
                    </select>
                    @error('estatus')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-8">
                    <label for="ingreso" class="mb-2 block uppercase text-gray-700 font-bold">
                        Fecha de ingreso 
                    </label>
                    <input
                        id="ingreso"
                        name="ingreso" 
                        type="date"
                        class="border-2 font-medium text-gray-500 p-3 w-full rounded-lg @error('ingreso') border-red-500
                        @enderror"
                        value="{{ $suajes->ingreso }}"
                    />
                    @error('estatus')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-2">
                    <a href="/suajes" class="text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:ring-red-400 font-bold uppercase rounded-lg  px-20 py-3 mr-3 ">
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
    </body>
</html> 