<x-sidebar-layout>

    <div class="flex justify-center py-20">
        <div class="bg-white rounded shadow-md p-8 w-[40%]">
            <p class="p-2">Cadastro Formulario</p>
    
            <form action="{{  route('editBooks.update',['book'=>$book->id])  }}" method="POST">
                @csrf
                @method('PUT')
                <div class=" text-gray-500 focus-within:text-gray-900 mb-6">
                    <input type="text" class="block w-full h-11  pl-4 text-base font-normal
                     shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-lg" name="nome" placeholder="{{$book->nome}}">
                </div>
                
                <div class=" text-gray-500 focus-within:text-gray-900 mb-6">
                    <input type="text" class="block w-full h-11  pl-4 text-base font-normal
                     shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-lg" name="autor" placeholder="{{$book->autor}}">
                </div>
                
                <div class=" text-gray-500 focus-within:text-gray-900 mb-6">
                    <input type="text" class="block w-full h-11 pr-5 pl-4 text-base font-normal
                     shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-lg" name="descricao" placeholder="{{$book->descricao}}">
                </div>
                
                <button class="w-24 h-12 bg-indigo-700 hover:bg-indigo-900 duration-700 rounded shadow-xs text-white text-base font-semibold leading-6" type="submit">Submit</button>
            </form>

</x-sidebar-layout>