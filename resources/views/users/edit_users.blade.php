<x-sidebar-layout>
    <div class="pl-[15rem] pt-[6rem]">
        
                @foreach ($users as $user)
                <div class="pt-5 pr-5 pl-15">
                    <div class="sm:p-3  dark:bg-gray-800 shadow sm:rounded-lg">

                <div class="flex flex-row">

                    <p class="pt-2 pr-4 font-medium text-white">{{ $user->name }}</p>
                        
                        <form action="{{ route('users.update',['user'=>$user->id]) }}" method="POST">
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
                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-5 border border-red-700 rounded" type="submit">Deletar</button>
                            </div>
                        </form>
                </div>
                    </div>
                </div>
                @endforeach
    </div>
</x-sidebar-layout>
