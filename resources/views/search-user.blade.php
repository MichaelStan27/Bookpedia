@extends('layouts.main')

@section('title', 'Search User')

@section('content')
    <div class="container mx-auto w-[80%] xl:w-[83%] 4xl:w-[85%] mb-4">
        <div class="grid grid-cols-3">
            @forelse ($users as $user)
                <x-user-card :user="$user"></x-user-card>
            @empty
                <div class="col-start-3 text-center py-10">
                    <h1 class="font-bold text-2xl text-neutral-600">
                        No User Found
                    </h1>
                </div>
            @endforelse
        </div>
        {{ $users->links() }}
    </div>
@endsection
