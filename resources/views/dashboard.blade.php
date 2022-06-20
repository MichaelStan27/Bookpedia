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
                <img carousel-image src="{{ asset('assets/carousel-1.jpg') }}"
                    class="h-full w-full object-cover absolute inset-0 transition-all duration-500 z-10">
            </a>
            <a href="#">
                <img carousel-image src="{{ asset('assets/carousel-2.jpg') }}"
                    class="h-full w-full object-cover absolute inset-0 transition-all duration-500 z-0">
            </a>
            <a href="#">
                <img carousel-image src="{{ asset('assets/carousel-3.png') }}"
                    class="h-full w-full object-cover absolute inset-0 transition-all duration-500 z-0">
            </a>
        </div>

        <div class="mx-auto mb-10">
            <h1 class="text-lg mb-2 font-bold">Dashboard</h1>
            <div class="w-full flex justify-center gap-10">
                <div class="w-1/4 bg-white rounded-lg p-4 self-start">
                    Filter
                </div>
                <div class="w-4/5">
                    <div class="grid grid-cols-4 gap-5">
                        @for ($i = 0; $i < 9; $i++)
                            <x-book-card></x-book-card>
                        @endfor
                    </div>
                    <a href="#" class="block my-4">Show more</a>
                </div>
            </div>
        </div>
        <div class="mx-auto">
            <h1 class="text-lg mb-2 font-bold">Nearby users</h1>
            <div class="flex gap-5">
                @for ($i = 0; $i < 5; $i++)
                    <div class="bg-gray-100 rounded-lg shadow-md overflow-hidden w-1/5">
                        <div class="bg-gray-400 w-full bg-cover h-60">
                            <img class="w-full h-full object-cover" src="{{ asset('assets/account.png') }}">
                        </div>
                        <div class="p-3 text-sm">
                            <p>Name</p>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
@endsection
