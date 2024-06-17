<x-sidebar-layout>
    <div class="flex pt-20 items-center justify-center min-h-screen container mx-auto ">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
           
            @foreach ($books as $book)
            <div class="px-2 pt-6 w-[22rem]">
                <div class="rounded overflow-hidden shadow-lg">
    
                    <a href="{{ route('showBooks.show',['book'=>$book->id]) }}">
                <img class="w-full h-[30rem] hover:h-[31rem] " src="{{ asset( "capas/$book->capa" ) }}" alt="Capas">
              </a>
                <div class="px-6 py-4 dark:bg-white">
                  <div class="mb-1">
                    <p class="font-bold text-xl">{{ $book->nome }}</p>
                  </div>
                  <p class=" text-gray-700 text-sm">Autor: {{ $book->autor }}</p>
               
                  <p class="text-gray-700 text-base">
                    {{ $book->descricao }}
                  </p>
                  <div class="flex justify-between">
                    @can('is_ADM')

                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-5  border border-blue-700 rounded" type="submit">Editar</button>
                    
                    <form action="{{ route('dashboard.destroy',['book'=>$book->id]) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <div class="pl-4">
                      <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-5  border border-red-700 rounded" type="submit">Deletar</button>
                      </div>
                  </form>  
                    
                    @endcan  
                  </div>
                </div>
               </div>
              </div>

              @endforeach
    </div>
        </div>
</x-sidebar-layout>