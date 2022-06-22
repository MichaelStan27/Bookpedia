@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <div class="container mx-auto w-[70%] mb-[20rem]">
        <div class="relative h-[24rem] overflow-hidden bg-neutral-200 rounded-lg mx-auto my-10">
            <button id="carousel-prev-btn" class="absolute left-5 bottom-1/2 translate-y-1/2 select-none z-20">
                <i
                    class="fa-solid fa-circle-chevron-left fa-2xl text-white transition-all active:scale-110 hover:text-neutral-100"></i>
            </button>
            <button id="carousel-next-btn" class="absolute right-5 bottom-1/2 translate-y-1/2 select-none z-20">
                <i
                    class="fa-solid fa-circle-chevron-right fa-2xl text-white transition-all active:scale-110 hover:text-neutral-100"></i>
            </button>

            <a href="#">
                <img carousel-image src="{{ asset('assets/carousel/carousel-1.jpg') }}"
                    class="h-full w-full object-cover absolute inset-0 transition-all duration-500 z-10">
            </a>
            <a href="#">
                <img carousel-image src="{{ asset('assets/carousel/carousel-2.jpg') }}"
                    class="h-full w-full object-cover absolute inset-0 transition-all duration-500 z-0">
            </a>
            <a href="#">
                <img carousel-image src="{{ asset('assets/carousel/carousel-3.png') }}"
                    class="h-full w-full object-cover absolute inset-0 transition-all duration-500 z-0">
            </a>
        </div>

        <div class="mx-auto mb-10">
            <h1 class="text-lg mb-2 font-bold">Dashboard</h1>
            <div class="w-full flex justify-center gap-10">
                <div class="w-1/4 bg-white rounded-lg p-4 self-start">
                    <h1 class="font-bold text-lg">Filter</h1>
                    <form action="" method="GET">
                        <div class="mb-5">
                            <h3 class="font-bold">Category</h3>
                            <ul class="ml-2 text-neutral-600">
                                <li>
                                    <input type="checkbox" name="fiction" id="fiction" value="fiction">
                                    <label for="rent">Fiction</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="poetry" id="poetry" value="poetry">
                                    <label for="rent">Poetry</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="science" id="science" value="science">
                                    <label for="rent">Science</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="selfhelp" id="selfhelp" value="selfhelp">
                                    <label for="rent">Self-help</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="comic" id="comic" value="comic">
                                    <label for="rent">Comic</label>
                                </li>
                            </ul>
                        </div>
                        <div class="mb-5">
                            <h3 class="font-bold">Type</h3>
                            <ul class="ml-2 text-neutral-600">
                                <li>
                                    <input type="checkbox" name="rent" id="rent" value="rent">
                                    <label for="rent">Rent</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="sell" id="sell" value="sell">
                                    <label for="sell">Sell</label>
                                </li>
                            </ul>
                        </div>
                        <div class="mb-5">
                            <h3 class="font-bold">Price</h3>
                            <ul class="ml-2 text-neutral-600">
                                <li>
                                    <input type="radio" name="priceSort" id="priceSort" value="priceSort">
                                    <label for="rent">Low-High Price</label>
                                </li>
                                <li>
                                    <input type="radio" name="priceSort" id="priceSort" value="priceSort">
                                    <label for="rent">High-Low Price</label>
                                </li>
                            </ul>
                        </div>
                        <div class="mb-5">
                            <h3 class="font-bold">Title</h3>
                            <ul class="ml-2 text-neutral-600">
                                <li>
                                    <input type="radio" name="titleSort" id="titleSort" value="titleSort">
                                    <label for="rent">Ascending</label>
                                </li>
                                <li>
                                    <input type="radio" name="titleSort" id="titleSort" value="titleSort">
                                    <label for="rent">Descending</label>
                                </li>
                            </ul>
                        </div>
                        <div class="text-center">
                            <button type="submit"
                                class="w-4/5 py-2 bg-neutral-500 text-white rounded-md hover:bg-neutral-600">Filter</button>
                        </div>
                    </form>
                </div>
                <div class="w-4/5">
                    <div class="grid grid-cols-2 gap-5">
                        @foreach ($books as $book)
                            <x-book-card :book="$book"></x-book-card>
                        @endforeach
                    </div>
                    <a href="/" class="block text-neutral-800 my-5">
                        <p class="inline-flex items-center">Show more
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
        <div class="mx-auto">
            <h1 class="text-lg mb-2 font-bold">Nearby users</h1>
            <div class="flex gap-5">
                @foreach ($users as $user)
                    <x-nearby-user-card :user="$user"></x-nearby-user-card>
                @endforeach
            </div>
        </div>
    </div>
@endsection
