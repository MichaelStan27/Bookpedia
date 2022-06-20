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
                            <x-book-card></x-book-card>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
