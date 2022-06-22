@extends('layouts.main')

@section('title', 'Search')

@section('content')
    <div class="container mx-auto w-[80%] mb-[20rem]">
        <div class="mx-auto my-10">
            <h1 class="text-lg mb-10">Searching for "keywords"</h1>
            <div class="w-full flex justify-center gap-10">
                <div class="w-1/4 bg-white rounded-lg p-4 self-start">
                    @include('partials.dashboard-filter')
                </div>
                <div class="w-4/5">
                    <div class="grid grid-cols-2 gap-5 mb-8">
                        @foreach ($books as $book)
                            <x-book-card :book="$book"></x-book-card>
                        @endforeach
                    </div>
                    {{ $books->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
