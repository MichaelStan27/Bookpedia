@extends('layouts.main')

@section('title', 'Profile')

@section('content')
    <div class="container mx-auto py-5 scroll-smooth">

        {{-- Profile Section --}}
        <div class="container py-1">
            <div class="bg-white flex justify-start items-center rounded-l-3xl rounded-r-3xl mt-4 mb-4 w-full">
                <div class="w-1/4 mx-10 py-4 text-center">
                    <img src="https://cdn.iconscout.com/icon/free/png-256/user-avatar-contact-portfolio-personal-portrait-profile-1-5182.png"
                        class="rounded-full my-4 mx-auto w-5/6" alt="">

                    <h5 class="text-2xl font-bold leading-tight mb-2 text-center">{{ auth()->user()->first_name }}
                        {{ auth()->user()->last_name }}</h5>
                </div>
                <div class="mx-5">
                    <div class="my-4 py-2">
                        <div class="flex items-center justify-start">
                            <img src="https://cdn-icons-png.flaticon.com/512/546/546394.png" alt=""
                                class="w-8 h-8 mx-2">
                            <label for="membersice" class="block text-xl text-left text-gray-500"><a
                                    href="mailto:{{ auth()->user()->email }}"
                                    class="text-decoration-none">{{ auth()->user()->email }}</a>
                        </div>
                    </div>
                    <div class="my-4 py-2">
                        <div class="flex items-center justify-start">
                            <img src="https://cdn-icons-png.flaticon.com/512/1077/1077063.png" alt=""
                                class="w-8 h-8 mx-2">
                            <label for="membersice" class="block text-xl text-left text-gray-500">Member since
                                <b>{{ auth()->user()->created_at->format('d F Y') }}</b>
                        </div>
                    </div>
                    <div class="my-4 py-2">
                        <div class="flex items-center justify-start">
                            <img src="https://cdn-icons-png.flaticon.com/512/535/535239.png" alt=""
                                class="w-8 h-8 mx-2">
                            <label for="location" class="text-left text-xl text-gray-500">{{ auth()->user()->city }}</b>
                        </div>
                    </div>
                    <div class="my-4 py-2">
                        <div class="flex items-center justify-start">
                            <img src="https://cdn-icons-png.flaticon.com/512/6506/6506327.png" alt=""
                                class="w-8 h-8 mx-2">
                            <h5 class="text-xl leading-tight">{{ auth()->user()->BalanceWithNotation }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- MyBook Section --}}
        <hr class="mt-2 mb-2">
        <div id="mybook" class="flex flex-wrap justify-between items-center">
            <div class="text-2xl font-bold">MY BOOK</div>
            <a href="/add-book/"
                class="inline-block px-6 py-3 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out">Add
                Book</a>
        </div>

        <div class="container px-2 py-6 h-full">
            <div class="bg-white flex justify-center rounded-l-3xl rounded-r-3xl">
                <div class="p-5">
                    <!--Card Start-->
                    <div class="grid grid-cols-3 gap-5">
                        @forelse ($Books as $book)
                            <x-book-card :book="$book"></x-book-card>
                        @empty
                            <h1 class="p-5 text-center text-2xl font-semibold text-slate-700">
                                Your Book is Empty!
                            </h1>
                        @endforelse
                    </div>
                    {{-- Card End --}}

                    {{-- Pagination --}}
                    <div class="mt-6">
                        {{ $Books->links() }}
                    </div>

                </div>
            </div>
        </div>

        {{-- MY WISHLIST SECTION --}}
        <hr class="mt-2 mb-6 scroll-smooth" id="wishlist">
        <div class="flex flex-wrap justify-between items-center">
            <div class="text-2xl font-bold">MY WISHLIST</div>
            <a href="/" class="text-green-800  md:mb-2 lg:mb-0">
                <p class="inline-flex items-center">More Wishlist
                    <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"></path>
                        <path d="M12 5l7 7-7 7"></path>
                    </svg>
                </p>
            </a>
        </div>

        {{-- Wishlist Data --}}
        <div class="container py-4">
            <section class="text-gray-1000 body-font">
                <div class="container px-5 py-5 mx-auto h-1/4">
                    <div class="flex flex-wrap -m-4 gap-20">
                        @forelse ($Wishlist as $wishlist)
                            <!--start here-->
                            <div class="md:w-[20%] bg-white  rounded-3xl shadow-xl">
                                <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                                    <div class="w-full">
                                        <div class="w-full flex p-2">
                                            <div class="p-2">
                                                <img src="https://cdn.iconscout.com/icon/free/png-256/profile-417-1163876.png"
                                                    alt="author" class="w-10 rounded-full overflow-hidden" />
                                            </div>
                                            <div class="pl-2 pt-2">
                                                <p class="font-bold">{{ $wishlist->user->first_name }}
                                                    {{ $wishlist->user->last_name }} </p>
                                                <p class="text-xs">{{ $wishlist->book->category->category_name }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <img class="w-full object-cover object-center"
                                        src="{{ asset("assets/{$wishlist->book->image}") }}" alt="Book Cover" />

                                    <div class="p-4">
                                        <h2
                                            class="tracking-widest text-xs title-font font-bold text-green-400 mb-1 uppercase ">
                                            @switch($book->transaction->id)
                                                @case(1)
                                                    <div class="">
                                                        <p class="font-bold text-md text-gray-600">Loan</p>
                                                        <p class="font-semibold text-md text-gray-500">
                                                            {{ $book->loan_price_with_notation }}</p>
                                                    </div>
                                                @break

                                                @case(2)
                                                    <div class="">
                                                        <p class="font-bold text-md text-gray-600">Sale</p>
                                                        <p class="font-semibold text-md text-gray-500">
                                                            {{ $book->sale_price_with_notation }}</p>
                                                    </div>
                                                @break

                                                @case(3)
                                                    <div class="grid grid-cols-2 divide-x-2">
                                                        <div class="bottom-0">
                                                            <p class="font-bold text-md text-gray-600">Loan</p>
                                                            <p class="font-semibold text-md text-gray-500">
                                                                {{ $book->loan_price_with_notation }}</p>
                                                        </div>
                                                        <div class="bottom-0">
                                                            <p class="font-bold text-md text-gray-600">Sale</p>
                                                            <p class="font-semibold text-md text-gray-500">
                                                                {{ $book->sale_price_with_notation }}</p>
                                                        </div>
                                                    </div>
                                                @break
                                            @endswitch
                                        </h2>
                                        <h1 class="title-font text-lg font-medium text-gray-900 mb-3">
                                            {{ Str::limit($wishlist->book->title, 15, $end = '...') }} </h1>
                                        <div class="flex justify-between items-center flex-wrap ">
                                            <a href="/book-detail/{{ $wishlist->book_id }}"
                                                class="text-green-800  md:mb-2 lg:mb-0">
                                                <p class="inline-flex items-center">Detail
                                                    <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor"
                                                        stroke-width="2" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path d="M5 12h14"></path>
                                                        <path d="M12 5l7 7-7 7"></path>
                                                    </svg>
                                                </p>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end here -->
                            @empty
                                <h1 class="p-5 mx-auto text-center text-2xl font-semibold text-slate-700">
                                    Your Wishlist is Empty!
                                </h1>
                            @endforelse

                        </div>
                    </div>
                </section>
            </div>
        </div>
    @endsection
