<div class="md:w-[20%] bg-white  rounded-3xl shadow-xl">
    <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
        <div class="w-full">
            <div class="w-full flex p-2">
                <a href="/user/profile/{{ $wishlist->user->id }}">
                    <div class="p-2">
                        <img src="https://cdn.iconscout.com/icon/free/png-256/profile-417-1163876.png" alt="author"
                            class="w-10 rounded-full overflow-hidden" />
                    </div>
                </a>
                <div class="pl-2 pt-2">
                    <a href="/user/profile/{{ $wishlist->user->id }}">
                        <p class="font-bold">{{ $wishlist->user->first_name }}
                            {{ $wishlist->user->last_name }} </p>
                    </a>
                    <a href="{{ route('search', ['category[]' => $wishlist->book->category->id]) }}" <p
                        class="text-xs">{{ $wishlist->book->category->category_name }}
                        </p>
                    </a>
                </div>
            </div>
        </div>

        <img class="w-full object-cover object-center" src="{{ asset("assets/{$wishlist->book->image}") }}"
            alt="Book Cover" />

        <div class="p-4">
            <h2 class="tracking-widest text-xs title-font font-bold text-green-400 mb-1 uppercase ">
                @switch($wishlist->book->transaction->id)
                    @case(1)
                        <div class="">
                            <p class="font-bold text-md text-gray-600">Loan</p>
                            <p class="font-semibold text-md text-gray-500">
                                {{ $wishlist->book->loan_price_with_notation }}</p>
                        </div>
                    @break

                    @case(2)
                        <div class="">
                            <p class="font-bold text-md text-gray-600">Sale</p>
                            <p class="font-semibold text-md text-gray-500">
                                {{ $wishlist->book->sale_price_with_notation }}</p>
                        </div>
                    @break

                    @case(3)
                        <div class="grid grid-cols-2 divide-x-2">
                            <div class="bottom-0">
                                <p class="font-bold text-md text-gray-600">Loan</p>
                                <p class="font-semibold text-md text-gray-500">
                                    {{ $wishlist->book->loan_price_with_notation }}</p>
                            </div>
                            <div class="bottom-0">
                                <p class="font-bold text-md text-gray-600">Sale</p>
                                <p class="font-semibold text-md text-gray-500">
                                    {{ $wishlist->book->sale_price_with_notation }}</p>
                            </div>
                        </div>
                    @break
                @endswitch
            </h2>
            <h1 class="title-font text-lg font-medium text-gray-900 mb-3">
                {{ Str::limit($wishlist->book->title, 15, $end = '...') }} </h1>
            <div class="flex justify-between items-center flex-wrap ">
                <a href="/book-detail/{{ $wishlist->book_id }}" class="text-green-800  md:mb-2 lg:mb-0">
                    <p class="inline-flex items-center">Detail
                        <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14"></path>
                            <path d="M12 5l7 7-7 7"></path>
                        </svg>
                    </p>
                </a>

            </div>
        </div>
    </div>
</div>
