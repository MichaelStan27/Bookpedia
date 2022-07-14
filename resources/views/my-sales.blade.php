@extends('layouts.main')

@section('title', 'My Sales')

@section('content')
    <div class="container mx-auto w-4/5 mb-[20rem]">
        <h1 class="font-bold text-xl">My Sales</h1>
        <div class="font-medium text-center text-gray-500 border-b border-gray-200 mb-5">
            <ul class="flex flex-wrap -mb-px">
                <li class="mr-2">
                    <a data-target="1" data-id="tabItem" href="{{ route('sales', ['tab' => 'ondelivery']) }}"
                        class="inline-block p-4 rounded-t-lg border-b-2 border-transparent @if ($target == 'ondelivery') active @else not-active @endif">
                        On delivery
                    </a>
                </li>
                <li class="mr-2">
                    <a data-target="2" data-id="tabItem" href="{{ route('sales', ['tab' => 'onloan']) }}"
                        class="inline-block p-4 rounded-t-lg border-b-2 @if ($target == 'onloan') active @else not-active @endif">
                        On loan
                    </a>
                </li>
                <li class="mr-2">
                    <a data-target="2" data-id="tabItem" href="{{ route('sales', ['tab' => 'finish']) }}"
                        class="inline-block p-4 rounded-t-lg border-b-2 @if ($target == 'finish') active @else not-active @endif">
                        Finish
                    </a>
                </li>
            </ul>
        </div>
        <div id="container" class="flex flex-col gap-4">
            @if ($target == 'onloan')
                @forelse ($groupedSales as $trans)
                    <x-sale-item-loan :tab="$target" :transaction="$trans"></x-sale-item-loan>
                @empty
                    <h1 class="text-neutral-500 text-lg font-medium">There is no book on loan</h1>
                @endforelse
            @else
                @forelse ($groupedSales as $groupSale)
                    <x-sales-item-parent :tab="$target" :groupSale="$groupSale"></x-sales-item-parent>
                @empty
                    <h1 class="text-neutral-500 text-lg font-medium">There is no on going sale</h1>
                @endforelse
            @endif
        </div>
    </div>
@endsection
