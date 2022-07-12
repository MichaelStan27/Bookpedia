@props(['cartItem', 'cartId', 'duration'])

<div class="items-box mb-2 flex justify-between items-center bg-white rounded-md shadow-md p-3 m-2">
    <div class="left-content flex gap-5">
        <a href="{{ route('book-detail', $cartItem->book) }}">
            <img class="h-20 w-20 hover:brightness-110" src="{{ asset("assets/{$cartItem->book->image}") }}"
                alt="">
        </a>

        <div class="items-description flex flex-col">
            <h1 class="font-medium">{{ $cartItem->book->title }} </h1>
            <h3 class="text-gray-500 text-xs"> {{ $cartItem->book->author }} </h3>

            <div class="flex flex-row gap-2 py-3">
                @if ($cartItem->type_id == 1)
                    <div class="flex items-center gap-4">
                        <h3 class="bg-zinc-900 border-2 border-zinc-900 text-white rounded-md text-center w-12 px-1">
                            Rent</h3>
                        <input data-id="durationInput" type="number" id="{{ $cartItem->id }}" autocomplete="off"
                            class="text-center px-3 w-14 rounded-md border-2 outline-gray-400 py-1 @error('sale_price') border-red-500 @enderror"
                            value="{{ $cartItem->duration }}" disabled>
                        <h3>(duration in week)</h3>
                    </div>
                @else
                    <h3 class="bg-zinc-900 border-2 border-zinc-900 text-white rounded-md text-center w-12 px-1">
                        Buy
                    </h3>
                @endif
            </div>
        </div>
    </div>

    <div class="right-content flex flex-col items-end">
        @if ($cartItem->type_id == 1)
            <h3 class="font-medium" id="">
                {{ 'IDR ' . number_format($cartItem->book->loan_price * $cartItem->duration) }}
            </h3>
        @else
            <h3 class="font-medium">{{ $cartItem->book->sale_price_with_notation }}</h3>
        @endif
    </div>
</div>
