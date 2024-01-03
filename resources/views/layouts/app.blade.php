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
        <title>RC Tools - Perfil usuario</title>
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
                        <-- <a  class="font-bold uppercase text-gray-600 text-sm" href="{{ route('register') }}">Registrar nuevo usuario</a>
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