@props(['book'])

<div class="flex flex-col md:flex-row md:max-w-xl rounded-lg bg-white shadow-xl outline outline-cyan-700">
    <img class="w-full h-96 md:h-auto object-cover md:w-36 lg:w-48 rounded-t-lg md:rounded-none md:rounded-l-lg"
        src="{{ asset("assets/{$book->image}") }}" alt="{{ $book->title }}" />
    <div class="flex flex-col justify-between w-full">
        <div class="p-6 flex flex-col justify-start">
            <a href="{{ route('book-detail', $book) }}"
                class="text-gray-900 md:text-lg text-xl font-medium hover:text-gray-700">
                {{ Str::limit($book->title, 50, $end = '...') }}
            </a>
            <a href="{{ route('search', ['category[]' => $book->category->id]) }}"
                class="text-xs mb-4 hover:text-gray-800">{{ $book->category->category_name }}</a>
            <div class="flex gap-10 md:gap-2">
                @switch($book->transaction->id)
                    @case(1)
                        <div>
                            <span class="md:text-sm">Loan price</span>
                            <h2 class="md:text-sm tracking-widest text-md font-bold text-black-400 mb-4">
                                {{ $book->loan_price_with_notation }}
                            </h2>
                        </div>
                    @break

                    @case(2)
                        <div>
                            <span class="md:text-sm">Sell price</span>
                            <h2 class="md:text-sm tracking-widest text-md font-bold text-black-400 mb-4">
                                {{ $book->sale_price_with_notation }}
                            </h2>
                        </div>
                    @break

                    @case(3)
                        <div class="grid grid-cols-2 gap-1 divide-x-2">
                            <div>
                                <span class="md:text-sm">Loan price</span>
                                <h2 class="md:text-sm tracking-widest text-md font-bold text-black-400 mb-4">
                                    {{ $book->loan_price_with_notation }}
                                </h2>
                            </div>
                            <div>
                                <span class="md:text-sm">Sell price</span>
                                <h2 class="md:text-sm tracking-widest text-md font-bold text-black-400 mb-4">
                                    {{ $book->sale_price_with_notation }}
                                </h2>
                            </div>
                        </div>
                    @break
                @endswitch
            </div>
            <h2 class="tracking-widest text-xs text-grey-400 uppercase">{{ $book->transaction_type_string }}</h2>
            <h2 class="tracking-widest text-xs title-font font-bold text-green-400 mb-4 uppercase">
                {{ $book->status_string }}
            </h2>
        </div>
        @auth
            @can('manage-the-book', $book)
                @if (Route::is('profile'))
                    <div class="p-3 flex flex-row justify-start gap-3">
                        <a href="{{ route('update-book', $book) }}"
                            class="inline-block px-4 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Edit</a>
                        <button type="button"
                            class="inline-block px-4 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">Delete</button>
                    </div>
                @endif
            @else
                @switch($book->transaction->id)
                    @case(1)
                        <div class="ml-3 p-3 flex flex-row justify-start gap-3">
                            <a href="{{ route('add-to-cart', $book) }}">
                                <button type="button"
                                    class="inline-block px-4 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Rent</button>
                            </a>

                        </div>
                    @break

                    @case(2)
                        <div class="ml-3 p-3 flex flex-row justify-start gap-3">
                            <a href="{{ route('add-to-cart', $book) }}">
                                <button type="button"
                                    class="inline-block px-4 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">Buy</button>
                            </a>
                        </div>
                    @break

                    @case(3)
                        <div class="ml-3 p-3 flex flex-row justify-start gap-3">
                            <form action="{{ route('add-to-cart', $book) }}" method="post">
                                @csrf
                                <input type="hidden" name="type" value="1">
                                <button type="submit"
                                    class="inline-block px-4 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Rent</button>
                            </form>
                            <form action="{{ route('add-to-cart', $book) }}" method="post">
                                @csrf
                                <input type="hidden" name="type" value="2">
                                <button type="submit"
                                    class="inline-block px-4 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">Buy</button>
                            </form>

                        </div>
                    @break
                @endswitch
            @endcan
        @endauth
        <div class="p-6 flex flex-col justify-start">
            <p class="text-gray-600 text-xs">{{ $book->updated_at->diffForHumans() }}</p>
        </div>
    </div>
</div>
