@extends('layouts.main')

@section('title', 'Book Detail')

@section('content')
    <div class="container mx-auto flex justify-center mb-4">
        <div class="bg-white shadow-md rounded-md border-2 py-4 w-3/4">
            <div class="flex justify-around w-full gap-5 mx-auto py-2 px-8">
                <img src="{{ asset("assets/$book->image") }}" alt="" class="w-1/4">
                <div class="w-3/4 p-2 h-full">
                    <div class="flex justify-between">
                        <h1 class="font-bold text-3xl">{{ $book->title }}</h1>
                        <form action="{{ route('wishlist', $book) }}" method="post">
                            @csrf
                            @auth
                                @if (Auth::user()->wishlists()->where('book_id', $book->id)->first())
                                    <div class="hover:scale-105 hover:text-red-100">
                                        <button type="submit" class="">
                                            <i class="fa-solid fa-heart fa-2xl text-red-500"></i>
                                        </button>
                                    </div>
                                @else
                                    <div class="hover:scale-105 hover:text-red-500">
                                        <button type="submit" class="">
                                            <i class="fa-solid fa-heart fa-2xl"></i>
                                        </button>
                                    </div>
                                @endif
                            @endauth
                        </form>
                    </div>

                    <a href="{{ route('search', ['category[]' => $book->category->id]) }}">
                        <h2 class="font-medium text-xl text-gray-500 mb-3">{{ $book->category->category_name }}</h2>
                    </a>
                    <h3 class="rounded-md bg-gray-300 pt-1 px-2 align-text-top text-sm mb-4 h-48">{{ $book->summary }}
                    </h3>
                    @switch($book->transaction->id)
                        @case(1)
                            <div class="text-center">
                                <h1 class="text-md font-medium">Rent</h1>
                                <h2 class="text-sm text-gray-500">{{ $book->loan_price_with_notation }}</h2>
                            </div>
                        @break

                        @case(2)
                            <div class="text-center">
                                <h1 class="text-md font-medium">Sell</h1>
                                <h2 class="text-sm text-gray-500">{{ $book->sale_price_with_notation }}</h2>
                            </div>
                        @break

                        @case(3)
                            <div class="grid grid-cols-2 divide-x-2">
                                <div class="text-center">
                                    <h1 class="text-md font-medium">Rent</h1>
                                    <h2 class="text-sm text-gray-500">{{ $book->loan_price_with_notation }}</h2>
                                </div>
                                <div class="text-center">
                                    <h1 class="text-md font-medium">Sell</h1>
                                    <h2 class="text-sm text-gray-500">{{ $book->sale_price_with_notation }}</h2>
                                </div>
                            </div>
                        @break
                    @endswitch
                </div>
            </div>

            <div class="mx-auto grid grid-cols-2 divide-x-2 divide-black py-2 px-8 w-full">
                <div class="bg-gray-300 rounded-l-md py-2 px-4">
                    <h1 class="font-bold text-md mb-4">Detail</h1>
                    <table class="text-sm">
                        <tr class="">
                            <td class="font-semibold">Tahun Terbit</td>
                            <td class="">: {{ $book->released_year }}</td>
                        </tr>
                        <tr class="">
                            <td class="font-semibold">Penerbit</td>
                            <td class="">: {{ $book->publisher }}</td>
                        </tr>
                        <tr class="">
                            <td class="font-semibold">Owner</td>
                            <td class="">: {{ $book->owner }}</td>
                        </tr>
                        <tr class="">
                            <td class="font-semibold">Author</td>
                            <td class="">: {{ $book->author }}</td>
                        </tr>

                    </table>
                </div>
                <div class="bg-gray-300 rounded-r-md py-2 px-4">
                    <h1 class=" font-bold text-md mb-4">Description</h1>
                    <p class="">{{ $book->description }}</p>
                </div>
            </div>
            @auth
                @can('manage-the-book', $book)
                    <div class="p-3 flex flex-row justify-start gap-3">
                        <a href="{{ route('profile') . '#mybook' }}"
                            class="inline-block px-4 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out mx-auto">
                            Manage book
                        </a>
                    </div>
                @else
                    @switch($book->transaction->id)
                        @case(1)
                            <div class="ml-3 p-3 flex flex-row justify-center gap-3">
                                <form action="{{ route('add-to-cart', $book) }}" method="post">
                                    @csrf
                                    <button type="submit"
                                        class="inline-block px-10 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Rent</button>
                                </form>

                            </div>
                        @break

                        @case(2)
                            <div class="ml-3 p-3 flex flex-row justify-center gap-3">
                                <form action="{{ route('add-to-cart', $book) }}" method="post">
                                    @csrf
                                    <button type="submit"
                                        class="inline-block px-10 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">Buy</button>
                                </form>
                            </div>
                        @break

                        @case(3)
                            <div class="ml-3 p-3 flex flex-row justify-center gap-3">
                                <form action="{{ route('add-to-cart', $book) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="type" value="1">
                                    <button type="submit"
                                        class="inline-block px-10 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Rent</button>
                                </form>
                                <form action="{{ route('add-to-cart', $book) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="type" value="2">
                                    <button type="submit"
                                        class="inline-block px-10 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">Buy</button>
                                </form>

                            </div>
                        @break
                    @endswitch
                @endcan
            @endauth
        </div>
    </div>

    <div class="container mx-auto flex justify-center">
        <div class="py-4 w-3/4">
            <h1 class="text-xl font-bold text-gray-500 mb-4">From This User</h1>
            <div class="grid grid-cols-4 gap-4 mb-2">
                @foreach ($books_from_user as $bookUser)
                    <x-book-user-card :book="$bookUser"> </x-book-user-card>
                @endforeach
            </div>
            <div class="text-right">
                <a href="{{ route('profile') }}" class="underline text-md text-gray-500 hover:text-gray-700">See
                    More...</a>
            </div>
        </div>
    </div>

    <div class="container mx-auto flex justify-center">
        <div class="py-4 w-3/4">
            <h1 class="text-xl font-bold text-gray-500 mb-4">Related Books</h1>
            <div class="grid grid-cols-4 gap-4 mb-2">
                @foreach ($related_books as $related_book)
                    <x-book-user-card :book="$related_book"> </x-book-user-card>
                @endforeach
            </div>
            <div class="text-right">
                <a href="{{ route('search', ['category[]' => $book->category->id]) }}"
                    class="underline text-md text-gray-500 hover:text-gray-700">See
                    More...</a>
            </div>
        </div>
    </div>
@endsection
