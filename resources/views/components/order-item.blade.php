@props(['transaction'])

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
        <div class="flex gap-3">
            <button class="py-3 px-7 rounded-md bg-red-500 text-white font-medium">
                Dibuang
            </button>
            <button class="py-3 px-7 rounded-md bg-blue-500 text-white font-medium">
                Diterima
            </button>
        </div>
    </div>
</div>
