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
        <title>RC Tools - Consultas</title>
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
                                @role(['Admin','GerenteProduccion'])
                                <a class="block px-4 py-2 mt-2 text-base text-black font-semibold  rounded-lg hover:bg-slate-300 uppercase" href="/catalogo">Catalogo</a>
                                @endrole
                                @role(['Admin','GerenteProduccion'])
                                <a class="block px-4 py-2 mt-2 text-base text-black font-semibold  rounded-lg hover:bg-slate-300 uppercase" href="/consultas"></a>
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
    </header>

    <body class="bg-gray-300">
        <h1 class="mt-20 ml-20 mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">Consultas<mark class="px-2 text-white bg-red-700 rounded ml-3">Base de datos</mark></h1>

        <h1 class="mt-20 ml-20 mb-4 text-2xl font-extrabold leading-none tracking-tight text-gray-900">Consulta<mark class="px-2 text-white bg-red-700 rounded ml-3">Registros empleados</mark></h1>
        
        <div class="w-3/4 mt-6 ml-20 bg-white p-6 rounded-lg shadow-xl flex flex-col">
            <div class="flex">
                
                <div class="mb-5 w-1/2">
                    <label for="" class="mb-2 block uppercase text-gray-700 font-bold text-center">
                        Nombre empleado
                    </label>
                    <select 
                        id="num1"
                        type="selected"
                        class="border-2 font-medium text-gray-500 p-3 w-full rounded-lg @error('') border-red-500
                        @enderror"
                    >
                        <option value="selected">Seleccione una opción</option>
                        <option value="953">Carlos Martinez Hernandez</option>
                        <option value="145">Daniel Hernandez Arreguin</option>
                    </select>    
                </div>

                <div class="mb-5 ml-6 w-1/5">
                    <label for="" class="mb-2 block uppercase text-gray-700 font-bold text-center">
                        Registro
                    </label>
                    <select 
                        id="num2" 
                        type="selected"
                        class="border-2 font-medium text-gray-500 p-3 w-full rounded-lg @error('') border-red-500
                        @enderror"
                        value=""
                    >
                    <option value="selected">Seleccione una opción</option>
                    <option value="registrotermoformados">Registro termoformado</option>
                    <option value="registroprensas">Registro prensa</option>
                    <option value="registroinspeccionbarrenados">Registro inspeccion y barrenado</option>
                    <option value="registroempaquetados">Registro empaquetado</option>
                    </select>
                </div>
                      
                <div class="mb-5 ml-6 w-3/5">
                    <label for="" class="mb-2 block uppercase text-gray-700 font-bold text-center">
                        Tipo de consulta
                    </label>
                    <select 
                        id="num5"
                        type="selected"
                        class="border-2 font-medium text-gray-500 p-3 w-full rounded-lg @error('') border-red-500
                        @enderror"
                        >
                        <option value="selected">Seleccione una opción</option>
                        <option value="piezas_buenas">Piezas buenas</option>
                        <option value="piezas_malas">Piezas malas</option>
                        <option value="sum(piezas_buenas)">Suma piezas buenas</option>
                        <option value="sum(piezas_malas)">Suma piezas malas</option>
                    </select>
                </div>

                <div class="mb-5 w-3/5 ml-6">
                    <label for="" class="mb-2 block uppercase text-gray-700 font-bold text-center">
                        Fecha De:
                    </label>
                    <input
                        id="num3"
                        type="date"
                        class="border-2 font-medium text-gray-500 p-3 w-full rounded-lg @error('inicio') border-red-500
                        @enderror"
                        value=""
                    />
                </div>

                <div class="mb-5 w-3/5 ml-6">
                    <label for="" class="mb-2 block uppercase text-gray-700 font-bold text-center">
                        A:
                    </label>
                    <input
                        id="num4" 
                        type="date"
                        placeholder="Fecha - termino de produccion"
                        class="border-2 font-medium text-gray-500 p-3 w-full rounded-lg @error('fecha_termino') border-red-500
                        @enderror"
                        value=""
                    />
                </div>
    
                <div class="mt-28">
                    <button 
                        onclick="mifuncion()" 
                        class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                                uppercase font-bold w-60 p-3 text-white rounded-lg mr-6"
                    > 
                        Generar consulta
                    </button>
                </div>
            </div>

            <p class="ml-6 mt-4" id="sumando" ></p>

            <script>

                    function mifuncion() {
                        var x,y,d,z,l,suma,text;

                        x = document.getElementById("num1").value;
                        y = document.getElementById("num2").value;
                        d = document.getElementById("num3").value;
                        z = document.getElementById("num4").value;
                        l = document.getElementById("num5").value; 
                        
                        text = "Select "+(l)+" from "+(y)+" where (empleado_id = "+(x)+" and fecha >= '"+(d)+"' and fecha <= '"+(z)+"')"

                        document.getElementById("sumando").innerHTML = text;
                
                    }

            </script>
        </div>
        
        <h1 class="mt-20 ml-20 mb-4 text-2xl font-extrabold leading-none tracking-tight text-gray-900">Tiempos<mark class="px-2 text-white bg-red-700 rounded ml-3">Muertos maquina</mark></h1>
            <div class="w-3/4 mt-6 ml-20 bg-white p-6 rounded-lg shadow-xl flex flex-col">
                <div class="flex">
                    <div class="mb-5 w-3/5">

                        <label for="" class="mb-2 block uppercase text-gray-700 font-bold text-center">
                        Termo formadora
                        </label>
                        <select 
                            id="termoformadora"
                            type="selected"
                            class="border-2 font-medium text-gray-500 p-3 w-full rounded-lg @error('') border-red-500
                            @enderror"
            
                        >
                            <option value="selected">Seleccione una opción</option>
                            <option value="termoformadora 1">termoformadora 1</option>
                            <option value="termoformadora 2">termoformadora 2</option>
                            <option value="termoformadora 3">termoformadora 3</option>
                            <option value="termoformadora 4">termoformadora 4</option>
                            <option value="termoformadora 5">termoformadora 5</option>
                        </select>
                        
                    </div>

                    <div class="mb-5 ml-6 w-3/5">

                        <label for="" class="mb-2 block uppercase text-gray-700 font-bold text-center">
                            Registro
                        </label>
                        <select 
                            id="registro" 
                            type="selected"
                            class="border-2 font-medium text-gray-500 p-3 w-full rounded-lg @error('') border-red-500
                            @enderror"
                            value=""
                        >
                        <option value="selected">Seleccione una opción</option>
                        <option value="registrotermoformados">Registro termoformado</option>
                        <option value="registroprensas">Registro prensa</option>
                        <option value="registroinspeccionbarrenados">Registro inspeccion y barrenado</option>
                        <option value="registroempaquetados">Registro empaquetado</option>
                        </select>
                    </div>

                    <div class="mb-5 w-3/5 ml-6">
                        <label for="" class="mb-2 block uppercase text-gray-700 font-bold text-center">
                            Fecha De:
                        </label>
                        <input
                            id="fechaini"
                            type="date"
                            class="border-2 font-medium text-gray-500 p-3 w-full rounded-lg @error('inicio') border-red-500
                            @enderror"
                            value=""
                        />
                    </div>

                    <div class="mb-5 w-3/5 ml-6">
                        <label for="" class="mb-2 block uppercase text-gray-700 font-bold text-center">
                            A:
                        </label>
                        <input
                            id="fechater" 
                            type="date"
                            placeholder="Fecha - termino de produccion"
                            class="border-2 font-medium text-gray-500 p-3 w-full rounded-lg @error('fecha_termino') border-red-500
                            @enderror"
                            value=""
                        />
                    </div>

                    <div class=" mt-28">
                        <button 
                            onclick="mifunciondos()" 
                            class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                                    uppercase font-bold w-60 p-3 text-white rounded-lg mr-6"
                        > 
                            Generar consulta
                        </button>
                    </div>
                </div>

                        <p class="ml-6 mt-4" id="consulta_maquina" ></p>

                        <script>

                                function mifunciondos() {
                                    var x,y,d,z,l,text;

                                    x = document.getElementById("termoformadora").value;
                                    y = document.getElementById("registro").value;
                                    d = document.getElementById("fechaini").value;
                                    z = document.getElementById("fechater").value;  
                            
                                    text = "Select maquina, tiempo_muerto_mantenimiento, causa, fecha from "+(y)+" where (maquina = '"+(x)+"' and fecha >= '"+(d)+"' and fecha <= '"+(z)+"')"

                                    document.getElementById("consulta_maquina").innerHTML = text;

                                } 
                        </script>
    </body>
</html>
                      