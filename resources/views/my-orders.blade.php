@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <div class="container mx-auto w-4/5 mb-[20rem]">
        <h1 class="font-bold text-xl">My Orders</h1>
        <div class="font-medium text-center text-gray-500 border-b border-gray-200 mb-5">
            <ul class="flex flex-wrap -mb-px">
                <li class="mr-2">
                    <a data-target="1" data-id="tabItem" href="#"
                        class="inline-block p-4 rounded-t-lg border-b-2 border-transparent active">
                        On going
                    </a>
                </li>
                <li class="mr-2">
                    <a data-target="2" data-id="tabItem" href="#"
                        class="inline-block p-4 rounded-t-lg border-b-2 not-active">
                        Finish
                    </a>
                </li>
            </ul>
        </div>
        <div id="container" class="flex flex-col gap-4">
            @forelse ($groupedOrders as $groupOrder)
                <x-order-item-parent :groupOrder="$groupOrder"></x-order-item-parent>
            @empty
                <h1 class="text-neutral-500 text-lg font-medium">No on going order</h1>
            @endforelse
        </div>
    </div>
@endsection
