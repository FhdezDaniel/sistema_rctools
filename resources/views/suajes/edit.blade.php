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
        <title>RC Tools - Editar suaje</title>
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
                            @role(['Admin','GerenteProduccion'])
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
        <div>
            <h2 class="mt-10 ml-20 mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 ">EDITAR REGISTRO de<mark class="px-2 text-white bg-red-700 rounded ml-3">Suaje</mark></h2>
        </div>
        <div class="w-4/12 h-2/3  ml-20 bg-white p-6 rounded-lg shadow-xl ">
            <form action="/suajes/{{ $suajes->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-5">
                    <label for="codigo" class="mb-2 block uppercase text-gray-700 font-bold">
                        Codigo
                    </label>
                    <input
                        id="codigo"
                        name="codigo" 
                        type="text"
                        class="border-2 font-medium text-gray-500 p-3 w-full rounded-lg @error('codigo') border-red-500
                        @enderror"
                        value="{{ $suajes->codigo }}"
                    />
                    @error('codigo')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                        <label for="corte_id" class="mb-2 block uppercase text-gray-700 font-bold">
                            Corte
                        </label>
                        <select
                            id="corte_id"
                            name="corte_id" 
                            type="selected"
                            class="border-2 font-medium uppercase text-gray-500 p-3 w-full rounded-lg @error('corte_id') border-red-500
                            @enderror"
                            value="{{ $suajes->corte_id }}"
                        >
                        <option value="{{ $suajes->corte_id }}">{{ $suajes->corte->nombre}}</option>
                        <option value="1">S10-T</option>
                        <option value="2">SKC</option>
                        <option value="3">SKC-X2</option>
                        <option value="4">NY7</option>
                        <option value="5">KSE</option>
                        <option value="6">WK055</option>
                        <option value="7">015</option>
                        <option value="8">NE5</option>
                        <option value="9">NSP</option>
                        <option value="10">NKK</option>
                        <option value="11">NG-01</option>
                        <option value="12">KG-020</option>
                        <option value="13">KS-25</option>
                        <option value="14">NKG</option>
                        <option value="15">MPH2</option>
                        <option value="16">W20</option>
                        <option value="17">SM1</option>
                        <option value="18">KD10</option>
                        <option value="19">COMPLETO</option>
                        <option value="21">POR MITAD</option>
                        <option value="22">PROPTECK 162</option>
                        <option value="23">FRIGOCEL VG2M</option>
                        <option value="24">FRIGOCEL FR42</option>
                        <option value="25">VALEO-08</option>
                        <option value="26">VALEO-07</option>
                        <option value="27">VALEO-07T</option>
                        <option value="28">VALEO-V09</option>
                        <option value="29">VALEO-630</option>
                        <option value="30">VALEO-V99</option>
                        <option value="31">VALEO-VRH</option>
                        <option value="32">VALEO-VRE</option>
                        <option value="33">Y2A</option>
                        <option value="34">AY8</option>
                        <option value="36">Y4A</option>
                        <option value="37">AYE-200</option>
                        <option value="38">AYE-128</option>
                        <option value="39">RAFI-086</option>
                        <option value="40">RAFI-104</option>
                        <option value="41">RAFI-105</option>
                        <option value="42">RAFI-110</option>
                        <option value="43">RAFI-145</option>
                        <option value="44">RAFI-A2X119</option>
                        <option value="45">RAFI-146</option>
                        <option value="46">OMRON 055</option>
                        <option value="47">OMRON 046</option>
                        <option value="48">OMRON 047</option>
                        <option value="49">OMRON 048</option>
                        <option value="50">KATOLECK-MODELO H</option>
                        <option value="51">KATOLECK-15T</option>
                        <option value="52">KATOLECK-020</option>
                        <option value="53">S10</option>
                        <option value="54">9X9 9X9</option>
                        <option value="55">T-15</option>
                        </select>
                        @error('corte_id')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                        @enderror
                    </div>
                <div class="mb-5">
                    <label for="activo" class="mb-2 block uppercase text-gray-700 font-bold">
                        Estatus activo
                    </label>
                    <input
                        id="activo"
                        name="activo" 
                        type="text"
                        class="border-2 font-medium text-gray-500 p-3 w-full rounded-lg @error('activo') border-red-500
                        @enderror"
                        value="{{ $suajes->activo }}"
                    />
                    @error('activo')
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
                            placeholder="Escriba la cantidad de suajes"
                            class="border-2 font-medium text-gray-500 p-3 w-full rounded-lg @error('cantidad') border-red-500
                            @enderror"
                            value="{{ $suajes->cantidad }}"
                        />
                        @error('cantidad')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                        @enderror
                </div>
       

                <div class="mb-5">
                    <label for="comentarios" class="mb-2 block uppercase text-gray-700 font-bold">
                        Comentarios
                    </label>
                    <input
                        id="comentarios"
                        name="comentarios" 
                        type="text"
                        class="border-2 font-medium text-gray-500 p-3 w-full rounded-lg @error('comentarios') border-red-500
                        @enderror"
                        value="{{ $suajes->comentarios }}"
                    />
                    @error('comentarios')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="estatus" class="mb-2 block uppercase text-gray-700 font-bold">
                        Estatus
                    </label>
                    <select
                        id="estatus"
                        name="estatus" 
                        type="selected"
                        class="border-2 font-medium text-gray-500 uppercase p-3 w-full rounded-lg @error('estatus') border-red-500
                        @enderror"
                        value="{{ $suajes->estatus }}"
                    >
                    <option selected>{{ $suajes->estatus}}</option>
                    <option value="DISPONIBLE">Disponible</option>
                    <option value="OCUPADO">Ocupado</option>
                    <option value="OBSOLETO">Obsoleto</option>
                    <option value="DAÑADO">Dañado</option>
                    </select>
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
                        value="Guardar"
                        class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                        uppercase  font-bold w-60 p-3 text-white rounded-lg"
                    />
                </div>
            </form>
        </div>
    </body>
</html> 