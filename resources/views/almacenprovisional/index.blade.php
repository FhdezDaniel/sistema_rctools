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

                <!-- Nav Links -->
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
    <div class="w-screen h-screen bg-gray-300">
        <div class="bg-gray-300">
            <p>.</p>
            <h1 class="mt-6 ml-20 mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">ALMACEN <mark class="px-2 text-white bg-red-700 rounded">Provisional</mark></h1>
        </div>
    <div>

    <div class="">
            <div class="ml-5 mt-12 mr-40 flex flex-col items-end">
                <a href="almacenprovisional/create" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-[#4285F4]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#4285F4]/55 mr-2 mb-2">
                    <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M.188 5H5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707c-.358.362-.617.81-.753 1.3C.148 5.011.166 5 .188 5ZM14 8a6 6 0 1 0 0 12 6 6 0 0 0 0-12Zm2 7h-1v1a1 1 0 0 1-2 0v-1h-1a1 1 0 0 1 0-2h1v-1a1 1 0 0 1 2 0v1h1a1 1 0 0 1 0 2Z"/>
                        <path d="M6 14a7.969 7.969 0 0 1 10-7.737V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H.188A.909.909 0 0 1 0 6.962V18a1.969 1.969 0 0 0 1.933 2h6.793A7.976 7.976 0 0 1 6 14Z"/>
                    </svg>
                    <span class="ml-2">CREAR NUEVO REGISTRO</span>
                <a>
            </div>
        <div class="w-5/6 flex flex-col ml-28 mt-5 items-center">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-black bg-amber-300 uppercase  dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                NOMBRE DEL PRODUCTO 
                            </th>
                            <th scope="col" class="px-6 py-3">
                                MATERIAL
                            </th>
                            <th scope="col" class="px-6 py-3">
                                PIEZAS
                            </th>
                            <th scope="col" class="px-6 py-3">
                                ACCION
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($almacenps as $almacen)
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $almacen->id }}</th>
                            <td class="font-medium text-gray-700">{{ $almacen->nombre}}</td>
                            <td class="font-medium text-gray-700">{{ $almacen->materia}}</td>
                            <td class="font-medium text-gray-700">{{ $almacen->piezas}}</td>
                            <td>
                                <form action="{{ route ('almacenprovisional.destroy',$almacen->id)}}" method="POST">
                                <a href="/almacenprovisional/{{ $almacen->id }}/edit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2">
                                    Editar
                                </a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="focus:outline-none mt-2 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
    </div>
   
    <!--<body>
    <div class="w-screen h-screen bg-gray-200">
        <div class="bg-gray-200">
            <p>.</p>
            <h1 class="mt-6 ml-5 mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">ALMACEN <mark class="px-2 text-white bg-red-700 rounded">Provisional</mark></h1>
        </div>
    <div>
        <div class="overflow-x-auto w-5/6 mt-10 ml-32 shadow-md sm:rounded-lg flex flex-col items-center">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 bg-amber-200 uppercase  dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            NOMBRE DEL PRODUCTO 
                        </th>
                        <th scope="col" class="px-6 py-3">
                            MATERIAL
                        </th>
                        <th scope="col" class="px-6 py-3">
                            PIEZAS
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            415
                        </th>
                        <td class="px-6 py-4">
                            FRIGOCEL 128 CAV
                        </td>
                        <td class="px-6 py-4">
                            10 X 41 BLANCO
                        </td>
                        <td class="px-6 py-4">
                            35
                        </td>
                        <td class="px-6 py-4">
                            <form action="">
                            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Editar</button>
                            <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    <tr class="border-b bg-gray-100 dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            416
                        </th>
                        <td class="px-6 py-4">
                            FRIGOCEL 200 CAV BLANCO
                        </td>
                        <td class="px-6 py-4">
                            12 X 41  BLANCO
                        </td>
                        <td class="px-6 py-4">
                            15
                        </td>
                        <td class="px-6 py-4">
                            <form action="">
                                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Editar</button>
                                <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            417
                        </th>
                        <td class="px-6 py-4">
                            AYE 128 CAV
                        </td>
                        <td class="px-6 py-4">
                            12 X 41 TRANSPARENTE
                        </td>
                        <td class="px-6 py-4">
                            20
                        </td>
                        <td class="px-6 py-4">
                         <form action="">
                            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Editar</button>
                            <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Eliminar</button>
                         </form>
                        </td>
                    </tr>
                    <tr class="border-b bg-gray-100 dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            418
                        </th>
                        <td class="px-6 py-4">
                            PK00054
                        </td>
                        <td class="px-6 py-4">
                            25 X 45 PET ESD TRANSPARENTE 
                        </td>
                        <td class="px-6 py-4">
                            200
                        </td>
                        <td class="px-6 py-4">
                            <form action="">
                                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Editar</button>
                                <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
    </div>
    <div class="w-screen h-20 bg-black flex flex-col items-center ">
        <form method="get" action="www.facebook.com" class="mt-2">
                <button
                    type="submit"
                    href="www.facebook.com"
                    data-te-ripple-init
                    data-te-ripple-color="light"
                    class="mb-2 inline-block rounded align-center px-6 py-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg"
                    style="background-color: #1877f2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                    </svg>
                </button>
        </form>
          <p class="text-center text-white">Norte 11 1129, Ciudad industrial de Celaya, 38010, teléfono: 461-216-0470</p>
        </div> 
    </body> -->
    </body>
</html>