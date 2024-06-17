<x-sidebar-layout>

  <div class=" pt-[6rem] pr-[5rem] pl-[15rem]">
    <div class=" sm:p-8 dark:bg-gray-800 shadow sm:rounded-lg">
        

      @if ($errors->any())
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      <div class="flex justify-center">
      <p class="text-[2rem] pb-4 text-white">Cadastro de livros</p>
      </div>
      <form action="{{ route('addBooks.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="flex justify-center pt-6 pb-8">
        <p class="pr-5 font-medium text-white">Nome 
      <input class="shadow rounded dark:bg-zinc-300 text-gray-700 leading-tight" type="text" name="nome">
        </p>
      </div>

      <div class="flex justify-center pb-8">
        <p class="pr-5 font-medium text-white">Autor   
      <input class="shadow rounded dark:bg-zinc-300 text-gray-700 leading-tight" type="text" name="autor">
        </p>
      </div>

      <div class="flex justify-center">
        <p class="font-medium text-white">Descrição</p>
      </div>
        <div class="flex justify-center">
      <textarea  class="rounded leading-tight dark:bg-zinc-300" type="text" name="descricao" rows="4" cols="50">
      </textarea>
        </div>  

      <div class="p-7 flex justify-center">
        <p class="pr-2 font-medium text-white">Capa</p>
      <input class=" text-gray-900 border border-gray-300 rounded-lg cursor-pointer  dark:text-gray-400
        dark:bg-gray-700 dark:border-gray-600" type="file" name="capa">
        
        <p class="pl-5 pr-2 font-medium text-white">Livro </p>
      <input class=" text-gray-900 border border-gray-300 rounded-lg cursor-pointer  dark:text-gray-400
        dark:bg-gray-700 dark:border-gray-600" type="file" name="livro">
    </div>

    <div class="flex justify-center">
      <button class=" hover:bg-gray-100 text-gray-800 font-semibold
       py-2 px-[5rem] border border-gray-400 rounded shadow dark:bg-zinc-300" type="submit">Enviar</button>
      </form>
    </div>
    
    </div>
  </div>

</x-sidebar-layout>