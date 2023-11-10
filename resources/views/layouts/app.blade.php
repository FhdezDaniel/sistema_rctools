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
        <title>Sistema RC Tools - @yield('titulo')</title>
    </head>

    <body class="bg-gray-300">
        <header class="p-5 bg-red-700 shadow">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-3xl flex items-center font-sans font-medium ml-3 text-white uppercase hover:text-black">
                <img class="h-16 mr-3" src="{{ asset('images/rctoolslogo.jpg') }}" alt="logo">
                    RC Tools S.A de C.V
                </h1>


                @auth 
                    <nav class="flex gap-2 items-center">
                        <a 
                            class="flex items-center gap-2 bg-gray-200 border p-2 text-black rounded text-sm
                            uppercase font-bold cursor-pointer"    
                            href="{{ route('posts.create') }}">
                        
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                        </svg>

                        Crear</a>

                        <a  class="font-bold text-white hover:text-black text-sm" 
                            href="{{ route('posts.index', auth()->user()->username) }}">
                            Hola:
                                <span class="font-normal"> 
                                    {{ auth()->user()->username }}
                                </span>
                        </a>
                        
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="font-bold uppercase text-white hover:text-black text-sm">
                                Cerrar sesión
                            </button>
                        </form>

                    </nav>
                @endauth
                @guest
                    <nav class="flex gap-2">
                        <a  class="font-bold uppercase text-white hover:text-black text-sm" href="/login">Iniciar sesión</a>
                       <!--  <a  class="font-bold uppercase text-gray-600 text-sm" href="{{ route('register') }}">Crear cuenta</a> -->
                    </nav>
                @endguest

            </div>
        </header> 
        <main class="container mx-auto mt-10">
            <h2 class="font-semibold text-center text-3xl mb-10">
                @yield('titulo')
            </h2>
            @yield('contenido')
        </main>
        
        <footer class="mt-52 text-center p-5 text-black font-bold uppercase">
            RC Tools s.a de c.v - Todos los derechos reservados <?php echo date('Y') ?>
        </footer>  
    </body>
</html>