@extends('layouts.main')

@section('title', 'Profile')

@section('content')
    <div class="container mx-auto py-5 scroll-smooth">

        {{-- Profile Section --}}
        @if (Route::is('profile'))
            @auth
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
                            @if (auth()->user()->key == session()->get('key'))
                                <div class="my-4 py-2">
                                    <div class="flex items-center justify-start">
                                        <img src="https://cdn-icons-png.flaticon.com/512/535/535239.png" alt=""
                                            class="w-8 h-8 mx-2">
                                        <label for="location"
                                            class="text-left text-xl text-gray-500">{{ auth()->user()->city }}</b>
                                    </div>
                                </div>
                            @endif
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
            @endauth
        @else
            <div class="container py-1">
                <div class="bg-white flex justify-start items-center rounded-l-3xl rounded-r-3xl mt-4 mb-4 w-full">
                    <div class="w-1/4 mx-10 py-4 text-center">
                        <img src="https://cdn.iconscout.com/icon/free/png-256/user-avatar-contact-portfolio-personal-portrait-profile-1-5182.png"
                            class="rounded-full my-4 mx-auto w-5/6" alt="">

                        <h5 class="text-2xl font-bold leading-tight mb-2 text-center">{{ $Users->first_name }}
                            {{ $Users->last_name }}</h5>
                    </div>
                    <div class="mx-5">
                        <div class="my-4 py-2">
                            <div class="flex items-center justify-start">
                                <img src="https://cdn-icons-png.flaticon.com/512/546/546394.png" alt=""
                                    class="w-8 h-8 mx-2">
                                <label for="membersice" class="block text-xl text-left text-gray-500"><a
                                        href="mailto:{{ $Users->email }}"
                                        class="text-decoration-none">{{ $Users->email }}</a>
                            </div>
                        </div>
                        <div class="my-4 py-2">
                            <div class="flex items-center justify-start">
                                <img src="https://cdn-icons-png.flaticon.com/512/1077/1077063.png" alt=""
                                    class="w-8 h-8 mx-2">
                                <label for="membersice" class="block text-xl text-left text-gray-500">Member since
                                    <b>{{ $Users->created_at->format('d F Y') }}</b>
                            </div>
                        </div>
                        <div class="my-4 py-2">
                            <div class="flex items-center justify-start">
                                <img src="https://cdn-icons-png.flaticon.com/512/535/535239.png" alt=""
                                    class="w-8 h-8 mx-2">
                                <label for="location" class="text-left text-xl text-gray-500">{{ $Users->city }}</b>
                            </div>
                        </div>
                        <div class="my-4 py-2">
                            <div class="flex items-center justify-start">
                                <img src="https://cdn-icons.flaticon.com/png/512/2099/premium/2099140.png?token=exp=1656296185~hmac=87836b9dd8edbd6e9a224e204b47a01e"
                                    alt="" class="w-8 h-8 mx-2">
                                <h5 class="text-xl leading-tight text-gray-500">{{ $Users->phone_number }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif


        {{-- MyBook Section --}}
        <hr class="mt-2 mb-2">
        <div id="mybook" class="flex flex-wrap justify-between items-center">
            <div class="text-2xl font-bold"> BOOK</div>
            @auth
                @if (Route::is('profile'))
                    <a href="{{ route('add-book') }}"
                        class="inline-block px-6 py-3 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out">Add
                        Book</a>
                @endif
            @endauth
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
                                Book is Empty!
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
            <div class="text-2xl font-bold">WISHLIST</div>
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
                            <x-wishlist :wishlist="$wishlist">
                            </x-wishlist>
                            <!-- end here -->
                        @empty
                            <h1 class="p-5 mx-auto text-center text-2xl font-semibold text-slate-700">
                                Wishlist is Empty!
                            </h1>
                        @endforelse

                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
