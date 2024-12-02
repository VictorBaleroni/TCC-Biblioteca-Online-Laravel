<div class="pt-[4rem] pr-[10rem] pl-[10rem]">
    <div class="max-w-xl mx-auto m-4 p-10 bg-white rounded shadow-xl">
        <div class="flex justify-center">
            <p class="text-[2rem] pb-4">Editar</p>
        </div>
        <form wire:submit.prevent="editBook">
            <div class="text-red-700">@error('bookName') {{ $message }} @enderror</div>
            <input type='text' wire:model="bookName" placeholder='{{$book->nome}}' class="px-4 py-2 mb-4 text-lg rounded-md bg-white border border-gray-400 w-full outline-blue-500"/>

            <div class="text-red-700">@error('bookAutor') {{ $message }} @enderror</div>
            <input type='text' wire:model="bookAutor" placeholder='{{$book->autor}}' class="px-4 py-2 mb-4 text-lg rounded-md bg-white border border-gray-400 w-full outline-blue-500"/>

            <div class="text-red-700">@error('bookdescricao') {{ $message }} @enderror</div>
            <input type='text' wire:model="bookdescricao" placeholder='{{$book->descricao}}' class="px-4 py-2 mb-4 text-lg rounded-md bg-white border border-gray-400 w-full outline-blue-500"/>
            
            @if (session()->has('genError'))
            <div class="text-red-700 flex justify-center">
                {{ session('genError') }}
            </div>
            @endif
            <select wire:model="genBook" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-400 
            px-4 mb-4 rounded-md shadow leading-tight focus:outline-none focus:shadow-outline ">
                <option value="inactive" disabled>{{$book->genero}}</option>
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
            

            <label for="file-input">Capa do Livro</label>
            <div class="text-red-700">@error('bookCapa') {{ $message }} @enderror</div>
            <input type="file" wire:model="bookCapa" accept=".jpg,.png" class="mb-4 w-full border border-gray-400 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 
            focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4">
            

            <div class="flex justify-center">
            @if($bookCapa)
            <img class="w-28 h-32" src="{{$bookCapa->temporaryUrl()}}" alt="">
            @endif
            </div>

            <div class="flex justify-center py-2">
                <label class="px-1">
                    <input type="radio" wire:model="typeArq" value="isPdf">
                    PDF
                </label>
                <label class="px-1">
                    <input type="radio" wire:model="typeArq" value="isEpub">
                    Epub
                </label>
            </div>
            @if (session()->has('typeArqError'))
            <div class="text-red-700 flex justify-center">
                {{ session('typeArqError') }}
            </div>
            @endif
            <label for="file-input">Arquivo do Livro</label>
            <div class="text-red-700">@error('bookFile') {{ $message }} @enderror</div>
            <input type="file" accept=".pdf, .epub" wire:model="bookFile" class="mb-6 w-full border border-gray-400 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 
            focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4">

            <div class="flex justify-center">
            <button class="hover:bg-zinc-300 text-gray-800 font-semibold py-2 px-[5rem]
             border border-gray-400 rounded shadow dark:bg-gray-100" type="submit">Enviar</button>
            </div>
        </form>
    </div>
</div>

