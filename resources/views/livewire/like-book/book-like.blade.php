<div>
    @if (Auth::user()->likesBooks($book))
    <div class="flex items-center">
    <a class="flex justify-center items-center mb-1 p-3 rounded-lg  dark:hover:bg-gray-700" href="#" wire:click.prevent="deslike({{$book->id}})">
        <img class="h-8 w-8" src="{{ asset('img/icon_deslike.ico') }}" alt="deslike"></a>
        <span class="text-white">{{$book->likes()->count()}}</span>
    </div>
    @else
    <div class="flex items-center">
    <a class="flex justify-center items-center mb-1 p-3 rounded-lg  dark:hover:bg-gray-700" href="#" wire:click.prevent="like({{$book->id}})">
        <img class="h-8 w-8" src="{{ asset('img/icon_like.ico') }}" alt="Like"></a>
        <span class="text-white">{{$book->likes()->count()}}</span>
    </div>
    @endif
</div>