@if (!$trashes->isEmpty())
    <div id="popup" class="w-screen h-screen p-10 flex flex-col justify-center bg-black/60 bg fixed top-0 z-10">
        <div class="w-1/2 h-fit max-h-[30rem] py-7 px-12 flex flex-col gap-5 bg-gray-100 shadow-2xl rounded-lg m-auto">
            @if ($type == 'book-deleted')
                <h1 class="text-2xl">{{ $trashes->count() }} book(s) in your cart was bought by someone or deleted by
                    the owner</h1>
            @else
                <h1 class="text-2xl">{{ $trashes->count() }} book(s) in your cart is being borrowed by another user
                </h1>
            @endif
            <div class="flex flex-col overflow-y-auto pr-5">
                @foreach ($trashes as $cartItem)
                    <x-cart-entry-trashed :cartItem="$cartItem"></x-cart-entry-trashed>
                @endforeach
            </div>
            <div class="text-right w-full">
                <form action="{{ route('cart.remove-trashed', $type) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="py-1 px-3 bg-red-600 rounded-lg text-white font-semibold">REMOVE</button>
            </div>
        </div>
    </div>
@endif