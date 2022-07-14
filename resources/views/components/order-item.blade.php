@props(['transaction', 'tab'])

<div class="flex p-4">
    <div class="w-24">
        <img class="w-full h-full object-cover" src="{{ asset("assets/{$transaction->book->image}") }}">
    </div>
    <div class="ml-5 flex flex-col justify-between">
        <div>
            <h1 class="font-medium text-lg">{{ $transaction->book->title }}</h1>
            <h1 class="text-neutral-500">{{ $transaction->book->author }}</h1>
        </div>
        @if ($transaction->is_loan_trans)
            <div class="w-fit">
                <h1 class="flex items-end h-full px-2 py-1 font-bold border text-green-400 border-green-500">
                    {{ $transaction->loanDetails->duration . ' ' . Str::plural('week', $transaction->loanDetails->duration) }}
                </h1>
            </div>
        @endif
    </div>
    <div class="flex flex-col items-end flex-grow justify-between">
        <div>
            <h1 class="font-bold text-lg">
                {{ $transaction->item_price_with_notation }}
            </h1>
        </div>
        @if ($tab == 'onloan' && $transaction->transactionType->id == 1 && $transaction->loanDetails->deliveryStatus->is('loan'))
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
