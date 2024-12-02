<x-sidebar-layout>
    <div class="pt-[4rem]">
        <header class="bg-white shadow">
          <div class="mx-5 py-2">
            <div class="flex items-center justify-center w-full">
                <form action="{{route('users.index')}}" method="GET" class="max-w-lg">
                @csrf   
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input type="text" name="searchUser" class="w-full p-4 ps-10 px-[10rem] text-md rounded-lg dark:bg-gray-100
                        dark:border-gray-700" placeholder="Pesquisar..."  />
                        <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Procurar</button>
                    </div>
                </form>
            </div>
          </div>
        </header>
      </div>

    <div class="pl-[5rem]">
    @foreach ($users as $user)
    <div class="pt-5 pr-5 pl-15">
        <div class="sm:p-2 dark:bg-gray-800 rounded-md">
            <div class="flex justify-between">
                <div class="flex">
                <p class="pt-2 pr-1 font-medium text-white">Usuário:</p>   
                <p class="pt-2 pr-6 font-medium text-white">{{ $user->name }}</p>
                <p class="pt-2 pr-1 font-medium text-white">Email:</p>   
                <p class="pt-2 pr-1 font-medium text-white">{{ $user->email }}</p> 
            </div>
            <div class="flex">
                <form  action="{{ route('users.update',['user'=>$user->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="inline-block relative w-64">
                    <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 
                    px-4 py-[0.65rem] rounded shadow leading-tight focus:outline-none focus:shadow-outline" name="typeUser" onchange="this.form.submit()">
                        <option selected disabled>Usuário: {{ $user->typeUser }} </option>         
                        <option value="user">Usuário</option>
                        <option value="admin" >Admin </option>
                    </select>
                    </div>
                </form>
                <form action="{{ route('users.destroy',['user'=>$user->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="pl-4">
                        <button class=" items-center p-2 rounded-lg  dark:hover:bg-gray-700" type="submit">
                            <img class="h-7 w-8" src="{{ asset('img/icon_lixo.ico') }}" alt="delete"></a>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    @endforeach
    </div>
    
    <div class="flex py-10 justify-center">
        {{ $users->appends([
            'searchUser' => request()->get('searchUser', '')
        ])->links('vendor.pagination.tailwind') }}
    </div>
</x-sidebar-layout>
