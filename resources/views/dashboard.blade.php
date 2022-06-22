@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <div class="container mx-auto w-[80%] mb-[20rem]">
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
                    @include('partials.dashboard-filter')
                </div>
                <div class="w-4/5">
                    <div class="grid grid-cols-2 gap-5">
                        @foreach ($books as $book)
                            <x-book-card :book="$book"></x-book-card>
                        @endforeach
                    </div>
                    <a href="{{ route('search') }}" class="block text-neutral-800 my-5">
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
