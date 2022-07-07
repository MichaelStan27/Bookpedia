@extends('layouts.main')

@section('title', 'Profile')

@section('content')
    <div class="container mx-auto py-5 scroll-smooth w-10/12">
        {{-- Profile Section --}}
        <div class="container py-1">
            <div class="bg-white flex justify-start items-center rounded-l-3xl rounded-r-3xl mt-4 mb-4 w-full">
                <div class="w-1/4 mx-10 py-4 text-center">
                    <img src="https://cdn.iconscout.com/icon/free/png-256/user-avatar-contact-portfolio-personal-portrait-profile-1-5182.png"
                        class="rounded-full my-4 mx-auto w-5/6" alt="">

                    <h5 class="text-2xl font-bold leading-tight mb-2 text-center">
                        {{ $user->fullname }}
                    </h5>
                </div>
                <div class="mx-5">
                    <div class="my-4 py-2">
                        <div class="flex items-center justify-start">
                            <img src="https://cdn-icons-png.flaticon.com/512/546/546394.png" alt=""
                                class="w-8 h-8 mx-2">
                            <label for="membersice" class="block text-xl text-left text-gray-500">
                                <a href="mailto:{{ $user->email }}" class="text-decoration-none">
                                    {{ $user->email }}
                                </a>
                            </label>
                        </div>
                    </div>
                    <div class="my-4 py-2">
                        <div class="flex items-center justify-start">
                            <img src="https://cdn-icons-png.flaticon.com/512/1077/1077063.png" alt=""
                                class="w-8 h-8 mx-2">
                            <label for="membersice" class="block text-xl text-left text-gray-500">
                                Member since <b>{{ $user->created_at->format('d F Y') }}</b>
                            </label>
                        </div>
                    </div>
                    <div class="my-4 py-2">
                        <div class="flex items-center justify-start">
                            <img src="https://cdn-icons-png.flaticon.com/512/535/535239.png" alt=""
                                class="w-8 h-8 mx-2">
                            <label for="location" class="text-left text-xl text-gray-500">
                                <b>{{ $user->city }}</b>
                            </label>
                        </div>
                    </div>
                    <div class="my-4 py-2">
                        <div class="flex items-center justify-start">
                            <img src="https://cdn-icons-png.flaticon.com/512/126/126509.png" alt=""
                                class="w-8 h-8 mx-2">
                            <h5 class="text-xl leading-tight text-gray-500">
                                {{ $user->phone_number }}
                            </h5>
                        </div>
                    </div>
                    @auth
                        @if (auth()->user()->id == $user->id)
                            <div class="my-4 py-2">
                                <div class="flex items-center justify-start">
                                    <img src="https://cdn-icons-png.flaticon.com/512/6506/6506327.png" alt=""
                                        class="w-8 h-8 mx-2">
                                    <h5 class="text-xl leading-tight text-gray-500">{{ $user->BalanceWithNotation }}</h5>
                                </div>
                            </div>
                        @endif
                    @endauth
                </div>
            </div>
        </div>

        @auth
            @if (auth()->user()->id == $user->id)
                <div class="bg-white rounded-xl flex gap-5 px-8 py-6 justify-between items-center">
                    <h1 class="text-xl font-bold uppercase">Transaction</h1>
                    <div class="flex gap-2">
                        <a href="{{ route('orders') }}"
                            class="rounded-md px-8 py-3 bg-blue-500 hover:bg-blue-600 text-white font-medium">
                            <i class="fa-solid fa-bag-shopping mr-2"></i>My orders
                        </a>
                        <a href="#"
                            class="rounded-md px-8 py-3 bg-green-500 hover:bg-green-600 text-white text-center font-medium">
                            <i class="fa-solid fa-book md:mr-2"></i>
                            <span class="hidden md:inline">My book status</span>
                        </a>
                    </div>
                </div>
            @endif
        @endauth

        {{-- MyBook Section --}}
        <hr class="my-5">
        <div id="mybook" class="flex flex-wrap justify-between items-center">
            <div class="text-2xl font-bold uppercase">
                @if (null !== auth()->user() && auth()->user()->id == $user->id)
                    MY BOOK
                @else
                    {{ $user->first_name }}'S BOOK
                @endif
            </div>
            @auth
                @if (auth()->user()->id == $user->id)
                    <a href="{{ route('add-book') }}"
                        class="inline-block 2xl:w-[10%] px-6 py-3 bg-blue-400 text-white text-center font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out">
                        Add Book
                    </a>
                @endif
            @endauth
        </div>

        <div class="container flex justify-center px-2 py-6 h-full">
            <div class="w-full bg-white rounded-l-3xl rounded-r-3xl p-10 2xl:px-3">
                <div
                    class="w-fit mx-auto grid grid-cols-2 gap-x-14 gap-y-5 lg:grid-cols-3 xl:grid-cols-2 2xl:grid-cols-3 2xl:gap-7">
                    @forelse ($books as $book)
                        <x-book-card :book="$book"></x-book-card>
                    @empty
                        <h1 class="content-start text-lg font-semibold text-neutral-500">
                            This user currently doesn't have any book
                        </h1>
                    @endforelse
                </div>
                <div class="mt-6">
                    {{ $books->links() }}
                </div>
            </div>
        </div>

        {{-- MY WISHLIST SECTION --}}
        <hr class="mt-2 mb-6 scroll-smooth" id="wishlist">
        <div class="flex flex-wrap justify-between items-center">
            <div class="text-2xl font-bold">WISHLIST</div>
        </div>

        {{-- Wishlist Data --}}
        <div class="container py-4">
            <section class="text-gray-1000 body-font">
                <div class="container mx-auto h-1/4">
                    <div class="flex flex-wrap mb-10 gap-20">
                        @forelse ($wishlist as $wish)
                            <x-wishlist :wishlist="$wish"></x-wishlist>
                        @empty
                            <h1 class="text-lg font-semibold text-neutral-600">
                                This user currently doesn't have any wishlist
                            </h1>
                        @endforelse
                    </div>
                    <div>
                        {{ $wishlist->links() }}
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
