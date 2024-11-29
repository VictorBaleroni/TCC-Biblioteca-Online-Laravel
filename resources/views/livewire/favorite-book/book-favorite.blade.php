<div class="flex justify-center">
    @if ($book->favorites->count())
    <a class="flex justify-center items-center mb-1 p-3 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700" href="#"wire:click.prevent="desfavoritar({{$book->id}})">
        <img class="h-8 w-8" src="{{ asset('img/icon_favorito_add.ico') }}" alt="Desfavoritar"></a>
    @else
    <a class="flex justify-center items-center mb-1 p-3 rounded-lg  dark:hover:bg-gray-700" href="#" wire:click.prevent="favoritar({{$book->id}})">
        <img class="h-7 w-8" src="{{ asset('img/icon_favorito.ico') }}" alt="Favoritar"></a>
    @endif
</div>
