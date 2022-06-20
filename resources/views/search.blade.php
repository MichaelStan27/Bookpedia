@extends('layouts.main')

@section('title', 'Search')

@section('content')
    <div class="container mx-auto w-[70%] mb-[20rem]">
        <div class="mx-auto my-10">
            <h1 class="text-lg mb-10">Searching for "keywords"</h1>
            <div class="w-full flex justify-center gap-10">
                <div class="w-1/4 bg-white rounded-lg p-4 self-start">
                    Filter
                </div>
                <div class="w-4/5">
                    <div class="grid grid-cols-4 gap-5">
                        @for ($i = 0; $i < 9; $i++)
                            <div class="bg-gray-100 rounded-lg shadow-md overflow-hidden">
                                <div class="bg-gray-400 w-full bg-cover h-36">
                                    <img class="w-full h-full object-cover" src="{{ asset('assets/carousel-1.jpg') }}">
                                </div>
                                <div class="p-3 text-sm">
                                    <p>Book title</p>
                                    <p class="font-bold">Rp. 200.000</p>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
