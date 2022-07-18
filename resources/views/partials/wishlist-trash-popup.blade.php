@if ($trashes && !$trashes->isEmpty())
    <div id="popup" class="w-screen h-screen flex flex-col justify-center bg-black/60 bg fixed top-0 z-10">
        <div
            class="w-1/2 h-fit max-h-[35rem] py-5 flex flex-col items-center gap-5 bg-gray-100 shadow-2xl rounded-lg m-auto">
            <h1 class="text-xl font-semibold">Your cart items are not available anymore</h1>
            <div class="w-full h-fit max-h-[35rem] py-5 px-10 flex flex-col gap-3 bg-gray-200 overflow-y-auto">
                <h1> {{ $trashes->count() }} book(s) in your wishlist was bought by someone or deleted
                    by
                    the owner</h1>
                <div class="flex flex-col pr-5">
                    @foreach ($trashes as $wishlist)
                        <x-wishlist-entry-trashed :wishlist="$wishlist"></x-wishlist-entry-trashed>
                    @endforeach
                </div>
            </div>
            <div class="text-center w-full">
                <button id="popupBtn" class="py-2 px-8 bg-blue-600 rounded-lg text-white font-semibold">Confirm</button>
            </div>
        </div>
    </div>
@endif
