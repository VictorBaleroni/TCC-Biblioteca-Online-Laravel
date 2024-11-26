<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Biblioteca</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
    </head>
    <body class="font-sans antialiased bg-gray-200">
        <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <div class="py-3">
              <div class="flex items-center justify-between">
                <div class="flex items-center">
                  <a href="{{ route('dashboard') }}" class="flex ms-2 md:me-24">
                    <x-application-logo class="me-3 block h-10 w-auto fill-current text-gray-600" />
                    <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Biblioteca</span>
                  </a>
                </div>
                <div class="flex px-4 items-center">
                    <div class="flex dark:text-white items-center ms-3">
                        <div>{{ Auth::user()->name }}</div>
                    </div>
                  </div>
              </div>
            </div>
          </nav>
          
            <aside class="border-r fixed pt-12 dark:border-gray-700">
                <div class="flex justify-between  h-screen flex-col pb-12 dark:bg-gray-800">
                  <div class="min-w-max mt-6 px-1">

                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                      <img class="h-8 w-8" src="{{ asset('img/icon_livros.ico') }}" alt="Livros">
                    </x-nav-link>

                    <x-nav-link :href="route('favorites')" :active="request()->routeIs('favorites')">
                      <img class="h-8 w-8" src="{{ asset('img/icon_favorito.ico') }}" alt="Favoritos">
                    </x-nav-link>
                      
                    <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                      <img class="h-8 w-8" src="{{ asset('img/icon_user_profile.ico') }}" alt="perfil">
                    </x-nav-link>

                      @can('is_ADM')
                      <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')">
                        <img class="h-8 w-8" src="{{ asset('img/icon_editar.ico') }}" alt="usuários">
                      </x-nav-link>

                      <x-nav-link :href="route('addBooks.create')" :active="request()->routeIs('addBooks.create')">
                        <img class="h-8 w-8" src="{{ asset('img/icon_livro_aberto.ico') }}" alt="Adicionar">
                      </x-nav-link>
                      @endcan
                  </div>

                    <div class="min-w-max">
                          <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="flex justify-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700" href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                <img class="-ml-2 h-8 w-8" src="{{ asset('img/icon_sair.ico') }}" alt="Sair">
                            </a>
                        </form>
                    </div>
                </div>
            </aside>
          
      {{ $slot }}
        
    </body>
</html>
