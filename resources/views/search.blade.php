@extends('layouts.main')

@section('title')
    @if (isset($keyword))
        {{ "Bookpedia - {$keyword}" }}
    @else
        Bookpedia
    @endif
@endsection

@section('content')
    <div class="container mx-auto w-[80%] mb-[20rem]">
        <div class="mx-auto my-10">
            @if (isset($keyword))
                <h1 class="text-lg mb-10">Searching for "{{ $keyword }}"</h1>
            @endif
            <div class="w-full flex justify-center gap-10">
                <div class="w-1/4 bg-white rounded-lg p-4 self-start">
                    @include('partials.dashboard-filter')
                </div>
                <div class="w-4/5">
                    <div class="grid grid-cols-2 gap-5 mb-8 relative">
                        @forelse ($books as $book)
                            <x-book-card :book="$book"></x-book-card>
                        @empty
                            <h1 class="absolute top-0 left-0 text-neutral-600 text-lg">No result found ...</h1>
                        @endforelse
                    </div>
                    {{ $books->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
