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
        <title>Sistema RC Tools</title>
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
                            <a class="block px-4 py-2 mt-2 text-base text-black font-semibold  rounded-lg hover:bg-slate-300 uppercase" href="/registroproduccion/create">Registro de producción</a>
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
        <div class="w-screen">
            <div>   
                <h1 class="mt-12 ml-20 mb-4 text-6xl font-extrabold leading-none tracking-tight text-gray-900">Linea <mark class="px-2 text-white bg-red-700 rounded">2</mark></h1>
            </div>
            <div class="mt-6 mr-60 flex flex-col items-end">
            <a href="/produccion" class="text-white bg-orange-500 hover:bg-orange-600 focus:outline-none focus:ring-[#4285F4]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#4285F4]/55 mr-2 mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                </svg>
                <span class="ml-2">REGRESAR</span>
                </a>  
            </div>

            <div class="ml-20 w-10/12 overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-black uppercase bg-blue-300 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID 
                            </th>
                            <th scope="col" class="px-6 py-3">
                                PRODUCTO 
                            </th>
                            <th scope="col" class="px-6 py-3">
                                CANTIDAD
                            </th>
                            <th scope="col" class="px-6 py-3">
                                SUAJE
                            </th>
                            <th scope="col" class="px-6 py-3">
                                CORTE
                            </th>
                            <th scope="col" class="px-6 py-3">
                                MATERIAL
                            </th>
                            <th scope="col" class="px-6 py-3">
                                FECHA - INICIO
                            </th>
                            <th scope="col" class="px-6 py-3">
                                FECHA - TERMINO
                            </th>
                            <th scope="col" class="px-6 py-3">
                                ESTATUS
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 uppercase">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"></th>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap dark:text-white"></td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap dark:text-white"></td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap dark:text-white"></td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap dark:text-white"></td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap dark:text-white"></td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap dark:text-white"></td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap dark:text-white"></td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap dark:text-white"></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="ml-20 mt-4 w-4/12 overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-black uppercase bg-amber-300">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID 
                            </th>
                            <th scope="col" class="px-6 py-3">
                                PRODUCTO 
                            </th>
                            <th scope="col" class="px-6 py-3">
                                ESTATUS
                            </th>
                            <th scope="col" class="px-6 py-3">
                                ACCION
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 uppercase">
                            <th scope="row" class="px-8 py-6 font-medium text-gray-900 whitespace-nowrap dark:text-white"></th>
                            <td scope="row" class="px-8 py-6 font-medium text-gray-700 whitespace-nowrap dark:text-white"></td>
                            <td scope="row" class="px-8 py-6 font-medium text-gray-700 whitespace-nowrap dark:text-white"></td>
                            <td>
                                <form action="" method="POST">
                                <a href="" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                                    Editar
                                </a>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-10 ml-20 flex">
                <div class="w-1/4 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">Nombre del producto</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Piezas estimadas:</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Piezas buenas:</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Piezas malas:</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Scrap</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Productividad</p>
                    
                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-sky-700 rounded-lg hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5v6m3-3H9m4.06-7.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                        </svg>    
                    <span class="ml-2">Completar datos</span>
                    </a>
                </div>
                <div class="ml-10 w-1/4 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">Nombre del producto</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Piezas estimadas:</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Piezas buenas:</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Piezas malas:</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Scrap</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Productividad</p>
                    
                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-sky-700 rounded-lg hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5v6m3-3H9m4.06-7.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                        </svg>    
                    <span class="ml-2">Completar datos</span>
                    </a>
                </div>
                <div class="ml-10 w-1/4 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">Nombre del producto</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Piezas estimadas:</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Piezas buenas:</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Piezas malas:</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Scrap</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Productividad</p>
                    
                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-sky-700 rounded-lg hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5v6m3-3H9m4.06-7.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                        </svg>    
                    <span class="ml-2">Completar datos</span>
                    </a>
                </div>
                <div class="ml-10 w-1/4 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">Nombre del producto</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Piezas estimadas:</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Piezas buenas:</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Piezas malas:</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Scrap</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Productividad</p>
                    
                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-sky-700 rounded-lg hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5v6m3-3H9m4.06-7.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                        </svg>    
                    <span class="ml-2">Completar datos</span>
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>