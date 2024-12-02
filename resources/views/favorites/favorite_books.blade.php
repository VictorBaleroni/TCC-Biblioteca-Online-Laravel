<x-sidebar-layout>
    <div class="pt-[4rem]">
        <header class="bg-white shadow">
          <div class="mx-5 py-2">
            <div class="flex items-center justify-center w-full">
                <form action="{{route('favorites')}}" method="GET" class="max-w-lg">
                @csrf   
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input type="text" name="searchFavorite" class="w-full p-4 ps-10 px-[10rem] text-md rounded-lg dark:bg-gray-100 
                        dark:border-gray-700" placeholder="Pesquisar..."  />
                        <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none 
                        focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Procurar</button>
                    </div>
                </form>
            </div>
            <div class="flex justify-center py-2">
                <form action="{{route('favorites')}}" method="GET" >
                  @csrf
                  <select name="searchFavorite" onchange="this.form.submit()" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 
                  px-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                      <option selected disabled>Filtrar por gênero</option>         
                      <option value="Ficcao">Ficção</option>
                      <option value="Romance" >Romance </option>
                      <option value="Fantasia">Fantasia</option>
                      <option value="Terror" >Terror </option>
                      <option value="Drama">Drama</option>
                      <option value="Biografia" >Biografia </option>
                      <option value="Historia">História</option>
                      <option value="Autoajuda" >Autoajuda </option>
                      <option value="Ciencia">Ciência</option>
                      <option value="Poesia" >Poesia </option>
                      <option value="Infantil">Infantil</option>
                      <option value="Cronicas" >Crônicas </option>
                      <option value="Religiao">Religião</option>
                      <option value="Aventura" >Aventura </option>
                      <option value="Mitologia">Mitologia</option>
                      <option value="Filosofia" >Filosofia </option>
                  </select>
              </form>
            </div>
          </div>
        </header>
    </div>

<div class="mx-[4rem] py-5">
    <div class="flex justify-center min-h-screen mx-auto">
        <div class="grid gap-4 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4"> 
        @foreach ($favorites as $index => $favorite)
        @if ($favorite->user->id == Auth::user()->id)
            <div>
                <div class="relative bg-gray-300 overflow-hidden rounded-md transition-all duration-300 group">
                        <a href="{{ route('showBooks.show',['book'=>$favorite->book->id]) }}">
                            <img class="w-full h-[30rem]" src="{{ asset( 'storage/'.$favorite->book->capa.'' ) }}" alt="Capas">
                        </a>
                    <div class="flex items-center justify-center py-4 dark:bg-gray-800">
                        <p class="text-white text-2xl">{{ $favorite->book->nome }}</p>
                    </div>
                    <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 absolute bottom-0 left-0 right-0 text-center font-semibold ">
                        <div class="px-6 py-4 dark:bg-gray-800">
                            <div class="mb-1">
                                <p class="text-white font-bold text-md">Autor: {{ $favorite->book->autor }}</p>
                            </div>
                                <p class="text-white text-sm">{{ $favorite->book->genero }}</p>
                                <p id="texto-curto-{{ $index }}" class="text-white text-sm">
                                {{ Str::limit($favorite->book->descricao, 30) }}
                              </p>
                              <p id="texto-completo-{{ $index }}" class="text-white text-sm" style="display: none;">{{ $favorite->book->descricao }}</p>
                              <button class="text-white" id="botao-leia-mais-{{ $index }}" data-index="{{ $index }}">Leia mais</button>
                            <div class="flex justify-center">
                                <form action="{{ route('favorites.destroy',['favorite'=>$favorite->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="flex justify-center items-center mb-1 p-3 rounded-lg  dark:hover:bg-gray-700" type="submit">
                                        <img class="h-7 w-8" src="{{ asset('img/icon_lixo.ico') }}" alt="delete"></a>
                                    </button>
                                </form> 
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @endforeach
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const botoes = document.querySelectorAll('[id^="botao-leia-mais-"]');

        botoes.forEach(botao => {
            botao.addEventListener('click', function() {
                const index = this.getAttribute('data-index');
                const textoCurto = document.getElementById(`texto-curto-${index}`);
                const textoCompleto = document.getElementById(`texto-completo-${index}`);
                
                if (textoCompleto.style.display === 'none') {
                    textoCompleto.style.display = 'block';
                    textoCurto.style.display = 'none';
                    this.textContent = 'Leia menos';
                } else {
                    textoCompleto.style.display = 'none';
                    textoCurto.style.display = 'block';
                    this.textContent = 'Leia mais';
                }
            });
        });
    });
</script>
</x-sidebar-layout>