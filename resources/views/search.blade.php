@extends('layouts.main')

@section('title')
    @if (isset($keyword))
        {{ "Bookpedia - {$keyword}" }}
    @else
        Bookpedia
    @endif
@endsection

@section('content')
    <div class="container mx-auto w-[80%] xl:w-[83%] 4xl:w-[85%] mb-[20rem]">
        <div class="mx-auto my-10">
            @if (isset($keyword))
                <h1 class="text-lg mb-10">Searching for "{{ $keyword }}"</h1>
            @endif
            <div class="w-full flex justify-between">
                <div
                    class="md:w-[29vw] lg:w-[25vw] lg:max-w-1/3 xl:w-1/4 2xl:w-[17vw] 3xl:w-[22vw] 4xl:w-1/5 bg-white rounded-lg p-4 self-start">
                    @include('partials.dashboard-filter')
                </div>
                <div class="w-fit mx-auto">
                    <div
                        class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-2 2xl:grid-cols-2 3xl:gap-8 4xl:gap-5 4xl:grid-cols-3 gap-5 mb-10 relative">
                        @forelse ($books as $book)
                            <x-book-card :book="$book"></x-book-card>
                        @empty
                            <h1 class="absolute top-80 left-0 w-fit whitespace-nowrap text-neutral-700 text-2xl">No Result
                                Found . . .</h1>
                        @endforelse
                    </div>
                    {{ $books->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
