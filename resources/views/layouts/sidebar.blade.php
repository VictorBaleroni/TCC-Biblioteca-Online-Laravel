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
    <body class="font-sans antialiased dark:bg-gray-300">
        
        <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <div class="px-3 py-3 lg:px-5 lg:pl-3">
              <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                  <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                      <span class="sr-only">Open sidebar</span>
                      <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                         <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                      </svg>
                   </button>
                  <a href="{{ route('dashboard') }}" class="flex ms-2 md:me-24">
                    <x-application-logo class="me-3 block h-10 w-auto fill-current text-gray-600" />
                    <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Biblioteca</span>
                  </a>
                </div>
                <div class="flex items-center">
                    <div class="flex dark:text-white items-center ms-3">
                        <div>{{ Auth::user()->name }}</div>
                    </div>
                  </div>
              </div>
            </div>
          </nav>
          
            <aside class=" w-[3.34rem]  border-r hover:w-56 fixed top-0 left-0 pt-10 transition-transform overflow-y-auto -translate-x-full 
          bg-white  border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700">
            
                <div class="flex h-screen flex-col justify-between pt-2 pb-11 px-1 bg-gray-50 dark:bg-gray-800">
                  <div>
                      
                    <ul class="mt-6 space-y-2 tracking-wide">
                      <li class="min-w-max">
                        <a href="{{ route('dashboard') }}" class="flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                          <img class="-ml-2 h-8 w-8" src="{{ asset('img/icon_livros.ico') }}" alt="">
                          <span class="ms-3 py-1">Livros</span>
                        </a>

                      <li class="min-w-max">
                        <a href="{{ route('profile.edit') }}" class="flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                          <img class="-ml-2 h-8 w-8" src="{{ asset('img/icon_editar.ico') }}" alt="">
                          <span class="ms-3 py-1">Editar conta</span>
                        </a>
                      </li>
                    </ul>
                  </div>

                  <ul class="mt-6 space-y-2 tracking-wide">
                    <li class="min-w-max">
                        <form method="POST" action="{{ route('logout') }}">
                          @csrf
                          <a class="flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group" href="route('logout')"
                                  onclick="event.preventDefault();
                                              this.closest('form').submit();">
                              <img class="-ml-2 h-8 w-8" src="{{ asset('img/icon_sair.ico') }}" alt="">
                              <span class="ms-3 py-1">Sair</span>
                        </a>
                      </form>
                    </li>
                  </ul>
                    
                </div>
            </aside>
          
            
      {{ $slot }}
        
    </body>
</html>
