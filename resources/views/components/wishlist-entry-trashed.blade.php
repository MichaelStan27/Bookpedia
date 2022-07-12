@props(['wishlist'])

<div class="items-box mb-2 flex gap-5 items-center bg-white rounded-md shadow-md p-3 m-2">
    <div class="left-content flex gap-5">
        <a href="{{ route('book-detail', $wishlist->book) }}">
            <img class="h-20 w-20 hover:brightness-110" src="{{ asset("assets/{$wishlist->book->image}") }}"
                alt="">
        </a>
    </div>

    <div class="w-full flex flex-col justify-between">
        <div class="items-description flex flex-col">
            <h1 class="font-medium">{{ $wishlist->book->title }} </h1>
            <h3 class="text-gray-500 text-xs"> {{ $wishlist->book->author }} </h3>
        </div>

        <div class="right-content flex flex-row h-full gap-3 items-end justify-end">
            <h1 class="text-sm">{{ $wishlist->book->user->full_name }}</h1>
            <h1 class="bg-zinc-900 text-white rounded-lg px-2 text-sm">Owner</h1>
        </div>
    </div>

</div>
