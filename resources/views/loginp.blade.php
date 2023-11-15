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
        <section>
            <nav class="flex justify-between bg-red-700 text-neutral-100 w-screen" :class="{'flex': open, 'hidden': !open}">
                <div class="px-10 py-4 flex w-screen items-center">
                <img class="h-16" src="{{ asset('images/rctoolslogo.jpg') }}" alt="logo"> 
                    <a class="text-3xl font-sans font-medium ml-3 hover:text-black uppercase" href="/home">
                        RC Tools 
                    </a>                
                </div>            
            </nav>
        </section>
    </header>

    <div class="md:flex md:justify-center md:gap-4 md:items-center">
        <div class="md:w-4/12 p-5">
            <img src="{{ asset('images/rctoolslogo.jpg') }}" alt="img-registro">
        </div>
    
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form method="POST" action=" " novalidate>
                @csrf            


                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Correo electronico
                    </label>
                    <input
                        id="email"
                        name="email" 
                        type="email"
                        placeholder="Tu E-mail de registro"
                        class="border p-3 w-full rounded-lg @error('email') border-red-500
                        @enderror"
                        value="{{ old('email') }}"
                    />
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                        Contraseña
                    </label>
                    <input
                        id="password"
                        name="password" 
                        type="password"
                        placeholder="Contraseña de registro"
                        class="border p-3 w-full rounded-lg @error('password') border-red-500
                        @enderror"
                    
                    />
                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input type="checkbox" name="remember"><label class="text-gray-500 font bold text-sm"> Mantener mi sesión abierta</label>
                </div>

                <input 
                    type="submit"
                    value="Iniciar sesión"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                    uppercase font-bold w-full p-3 text-white rounded-lg"
                />
            </form>
        </div>
    </div>

    <body class="bg-gray-300">
        
    </body>
</html>
