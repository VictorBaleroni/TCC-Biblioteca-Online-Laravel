<x-sidebar-layout>
    <div class="sm:ml-36 mt-14 px-3 py-12">
        
            
        
        <div>

            <ul>
                @foreach ($users as $user)
                    
                    <li>{{ $user->name }}

                        <form action="{{ route('users.update',['user'=>$user->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                           <select name="typeUser" onchange="this.form.submit()">
                            <option selected disabled>Usuário: {{ $user->typeUser }} </option>         
                            <option value="user">Usuário</option>
                            <option value="admin" >Admin </option>
                            </select>
                        </form>

                        <form action="{{ route('users.destroy',['user'=>$user->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 border border-red-700 rounded" type="submit">delete</button>
                        </form>
                    </li>
                @endforeach
            </ul>
            
        </div>

    
</div>
</x-sidebar-layout>