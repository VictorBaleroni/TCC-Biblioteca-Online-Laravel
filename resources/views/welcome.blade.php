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
      <div class="flex justify-start items-start bg-slate-800">
        <header>     
            @if (Route::has('login'))
                <nav class="p-4 flex justify-start items-center">
                    @auth
                    <div>
                        <a href="{{ url('/dashboard') }}"
                            class="p-4 rounded-md py-2 px-4 text-center text-sm shadow-md text-white bg-slate-700 border-slate-900">
                            Dashboard
                        </a>
                    </div>
                    @else
                    <div class="w-20">
                        <a href="{{ route('login') }}"
                            class="p-4 rounded-md py-2 px-4 text-center text-sm shadow-md text-white bg-slate-700 border-slate-900">
                            Entrar
                        </a>
                    </div>
                        @if (Route::has('register'))
                        <div>
                            <a href="{{ route('register') }}"
                                class="p-4 rounded-md py-2 px-4 text-center text-sm shadow-md text-white bg-slate-700 border-slate-900 ">
                                Registrar
                            </a>
                        </div>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>
    </div>
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
          
        <div class="mx-[4rem]">
            <div class="flex items-center justify-center min-h-screen container mx-auto">
                <div class="grid gap-4 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4"> 
                    @foreach ($books as $book)
                    <div class="pt-6">
                      <div class="relative bg-gray-300 overflow-hidden rounded-md shadow-lg transition-all duration-300 group">
                          <a href="{{ route('showBooks.show',['book'=>$book->id]) }}">
                            <img class="w-full h-[30rem]" src="{{ asset( "storage/$book->capa" ) }}" alt="Capas">
                          </a>
                          <div class="flex items-center justify-center py-4 bg-white">
                            <p class="text-black text-2xl">{{ $book->nome }}</p>
                        </div>

                      <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 absolute bottom-0 left-0 right-0 text-center font-semibold ">
                        <div class="px-6 py-4 bg-white">
                          <div class="mb-1">
                            <p class="text-black font-bold text-xl">{{ $book->nome }}</p>
                          </div>
                          <p class="text-black text-sm">Autor: {{ $book->autor }}</p>
                          <p class="text-black text-base">
                            {{ $book->descricao }}
                          </p>
                        </div>
                       </div>
                      </div>
                    </div>
                      @endforeach
                </div>
              </div>
            </div>

    </body>
</html>
