@props(['book'])

<div
    class="w-[24rem] h-64 flex flex-col md:flex-row md:max-w-xl rounded-lg bg-white shadow-xl outline outline-cyan-700 relative">
    <div class="group w-60 rounded-l-lg bg-black relative">
        <img class="w-36 h-64 rounded-tl-lg" src="{{ asset("assets/{$book->image}") }}" alt="{{ $book->title }}" />
        <div
            class="w-full h-3/4 py-2 transition-all duration-500 ease-in-out opacity-0 group-hover:opacity-100 flex flex-row justify-evenly items-end bg-gradient-to-t from-zinc-900 rounded-bl-lg absolute bottom-0">
            @auth
                @can('manage-the-book', $book)
                    @if (Route::is('profile'))
                        <a href="{{ route('update-book', $book) }}"
                            class="inline-block px-3 py-1.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Edit</a>
                        <form action="{{ route('delete-book', $book) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-block px-3 py-1.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">Delete</button>
                        </form>
                    @else
                        <a href="{{ route('profile', auth()->user()) . '#mybook' }}"
                            class="inline-block px-4 py-2 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                            Manage book
                        </a>
                    @endif
                @else
                    @switch($book->transaction->id)
                        @case(1)
                            <form action="" method="post">
                                @csrf
                                <button data-id="addToCartBtn" book-id="{{ $book->id }}" type="submit"
                                    class="inline-block px-4 py-2 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Rent</button>
                            </form>
                        @break

                        @case(2)
                            <form action="" method="post">
                                @csrf
                                <button data-id="addToCartBtn" book-id="{{ $book->id }}" type="submit"
                                    class="inline-block px-4 py-2 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">Buy</button>
                            </form>
                        @break

                        @case(3)
                            <form action="" method="post">
                                @csrf
                                <input type="hidden" name="type" value="1">
                                <button data-id="addToCartBtn" book-id="{{ $book->id }}" type="submit"
                                    class="inline-block px-4 py-2 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Rent</button>
                            </form>
                            <form action="" method="post">
                                @csrf
                                <input type="hidden" name="type" value="2">
                                <button data-id="addToCartBtn" book-id="{{ $book->id }}" type="submit"
                                    class="inline-block px-4 py-2 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">Buy</button>
                            </form>
                        @break
                    @endswitch
                @endcan
            @endauth
        </div>
    </div>
    <div class="px-6 py-3 w-full h-full flex flex-col gap-2 justify-start relative">
        <div>
            <a href="{{ route('book-detail', $book) }}"
                class="text-gray-900 md:text-lg text-lg font-medium hover:text-gray-600 hover:font-semibold">
                {{ Str::limit($book->title, 30, $end = '...') }}
            </a>
            <a href="{{ route('search', ['category[]' => $book->category->id]) }}"
                class="block text-xs hover:text-gray-600 hover:font-semibold">{{ $book->category->category_name }}</a>
        </div>

        <div class="">
            @switch($book->transaction->id)
                @case(1)
                    <div>
                        <span class="md:text-sm">Loan price (weekly)</span>
                        <h2 class="md:text-sm tracking-widest text-md font-bold text-black-400">
                            {{ $book->loan_price_with_notation }}
                        </h2>
                    </div>
                @break

                @case(2)
                    <div>
                        <span class="md:text-sm">Sell price</span>
                        <h2 class="md:text-sm tracking-widest text-md font-bold text-black-400">
                            {{ $book->sale_price_with_notation }}
                        </h2>
                    </div>
                @break

                @case(3)
                    <div>
                        <div>
                            <span class="md:text-sm">Loan price (weekly)</span>
                            <h2 class="md:text-sm tracking-widest text-md font-bold text-black-400">
                                {{ $book->loan_price_with_notation }}
                            </h2>
                        </div>
                        <div>
                            <span class="md:text-sm">Sell price</span>
                            <h2 class="md:text-sm tracking-widest text-md font-bold text-black-400">
                                {{ $book->sale_price_with_notation }}
                            </h2>
                        </div>
                    </div>
                @break
            @endswitch
        </div>
        <div>
            <h2 class="tracking-widest text-xs text-grey-400 uppercase">{{ $book->transaction_type_string }}</h2>
            <h2
                class="tracking-widest text-xs title-font font-bold  @if ($book->is_available) {{ 'text-green-400' }} @else {{ 'text-red-400' }} @endif uppercase">
                {{ $book->status_string }}
            </h2>
        </div>

        <div class="py-2 absolute bottom-0">
            <p class="text-gray-600 text-xs">{{ $book->updated_at->diffForHumans() }}</p>
        </div>
    </div>


</div>
