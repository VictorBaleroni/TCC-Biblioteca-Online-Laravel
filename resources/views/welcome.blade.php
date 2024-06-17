<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <title>Biblioteca Online</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="font-sans dark:bg-zinc-300">
        <nav class="fixed dark:text-white top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <div class="px-4 py-4 lg:px-5 lg:pl-3">
                
              <div class="flex items-center justify-between ">
                <div class="flex items-center">

                    @if (Route::has('login'))
        
                    @auth
                        <a class="px-3" href="{{ url('/dashboard') }}">Dashboard</a>
                    
                    @else
                        <a class="px-3" href="{{ route('login') }}">Log-in</a>
                    
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    
                    @endif
                    @endauth
                    @endif
                </div>  
              </div>
            </div>
          </nav>
          <div class=" bg-gradient-to-t from-gray-800 to-slate-500 h-96 w-full bg-cover bg-center relative">
          <img class="w-full h-full object-cover absolute mix-blend-overlay" src="{{ asset('img/initial_old_books.jpg') }}" alt="books">
          

          <div class="flex pl-[3rem] pt-[5.5rem]">
            <div class="pr-2">
                <img class="-ml-2 h-[4rem] w-[4.2rem]" src="{{ asset('img/icon_biblioteca.ico') }}" alt="">
            </div>

            <h1 class="text-white text-6xl font-bold">Biblioteca Online</h1>
          </div>

          <div class="pl-[7.2rem]">
            <h2 class="text-white text-3xl font-light">Livros Digitais</h2>
          </div>
          </div>
        </div>
          

    </body>
</html>
