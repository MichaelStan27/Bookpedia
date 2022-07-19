@props(['transaction', 'tab'])

<div class="flex flex-col p-6 bg-white rounded-md divide-y">
    <div class="flex justify-between pb-3">
        <div class="flex flex-col">
            <a href="{{ route('profile', $transaction->headerTransaction->buyer) }}"
                class="font-bold text-lg mb-2">{{ $transaction->headerTransaction->buyer->fullname }}</a>
            <div class="leading-relaxed">
                <div class="font-light text-neutral-500">
                    <i class="fa-solid fa-location-pin mr-2"></i>
                    <span>{{ $transaction->headerTransaction->buyer->user_address }}</span>
                </div>
                <div class="font-light text-neutral-500">
                    <i class="fa-solid fa-phone mr-2"></i>
                    <span>{{ $transaction->headerTransaction->buyer->phone_number }}</span>
                </div>
            </div>
        </div>

        <table class="h-fit">
            <tr>
                <td class="text-sm text-neutral-500">Start date</td>
                <td></td>
                <td class="text-sm text-neutral-500">End date</td>
            </tr>
            <tr>
                <td>
                    <h1 class="px-2 py-1 font-bold border text-sky-400 border-sky-500">
                        {{ $transaction->loanDetails->loan_date->format('d M Y') }}
                    </h1>
                </td>
                <td>
                    <span class="inline-block font-medium mx-3 pb-2">_</span>
                </td>
                <td>
                    <h1 class="px-2 py-1 font-bold border text-red-400 border-red-500">
                        {{ $transaction->loanDetails->deadline->format('d M Y') }}
                    </h1>
                </td>
            </tr>
        </table>
    </div>
    <div class="flex pt-5">
        <a href="{{ route('book-detail', $transaction->book) }}">
            <div class="w-24">
                <img class="w-full h-full object-cover" src="{{ asset("assets/{$transaction->book->image}") }}">
            </div>
        </a>
        <div class="ml-5 flex flex-col justify-between">
            <div>
                <a href="{{ route('book-detail', $transaction->book) }}" class="font-medium text-lg">
                    {{ $transaction->book->title }}
                </a>
                <h1 class="text-neutral-500">{{ $transaction->book->author }}</h1>
            </div>
            <div class="w-fit">
                <h1 class="flex items-end h-full px-2 py-1 font-bold border text-green-400 border-green-500">
                    {{ $transaction->loanDetails->duration . ' ' . Str::plural('week', $transaction->loanDetails->duration) }}
                </h1>
            </div>
        </div>
        <div class="flex flex-col items-end flex-grow justify-between">
            <div>
                <h1 class="font-bold text-lg">
                    {{ $transaction->item_price_with_notation }}
                </h1>
            </div>
            @if ($transaction->loanDetails->deliveryStatus->is('shipped back'))
                <div class="flex gap-3">
                    <form action="{{ route('update-sale-item', $transaction) }}" method="POST">
                        @csrf
                        <button class="py-3 px-7 rounded-md bg-green-500 text-white font-medium">
                            {{ $transaction->loanDetails->deliveryStatus->next_status }}
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</div>
