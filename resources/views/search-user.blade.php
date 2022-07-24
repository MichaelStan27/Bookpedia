@extends('layouts.main')

@section('title', 'Search User')

@section('content')
    <div class="container mx-auto w-[80%] xl:w-[83%] 4xl:w-[85%] mb-4 mt-12">
        <div class="grid grid-cols-3 gap-3">
            @forelse ($users as $user)
                @if (isset($userTrans[$user->id]))
                    <x-user-card :user="$user"
                        transactionCount="{{ $userTrans[$user->id] . '  successful ' . Str::plural('transaction', $userTrans[$user->id]) }}">
                    </x-user-card>
                @else
                    <x-user-card :user="$user" transactionCount="No successful transaction"></x-user-card>
                @endif
            @empty
                <div class="col-start-2 text-center py-10">
                    <h1 class="font-bold text-2xl text-neutral-600">
                        No User Found
                    </h1>
                </div>
            @endforelse
        </div>
        {{ $users->links() }}
    </div>
@endsection
