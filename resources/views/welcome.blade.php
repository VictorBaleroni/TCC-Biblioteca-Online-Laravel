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
    <body class="font-sans ">
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
        
    </body>
</html>
