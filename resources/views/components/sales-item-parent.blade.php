@props(['groupSale', 'tab'])

<div class="bg-white rounded-lg p-4 mb-5">
    <div class="divide-y">
        <div class="flex justify-between items-center py-2 mb-4 px-4">
            <h1 class="font-bold text-2xl">{{ $groupSale->buyer->fullname }}</h1>
            <h1 class="px-2 font-bold">{{ $groupSale->deliveryStatus->info }}</h1>
        </div>
        @if ($tab == 'ongoing')
            @foreach ($groupSale->detailTransactions as $transaction)
                @if ($groupSale->deliveryStatus->id < 3)
                    <x-order-item :tab="$tab" :transaction="$transaction"></x-order-item>
                @elseif ($transaction->transactionType->id == 1)
                    <x-order-item :tab="$tab" :transaction="$transaction"></x-order-item>
                @endif
            @endforeach
        @elseif ($tab == 'finish')
            @foreach ($groupSale->detailTransactions as $transaction)
                @if ($transaction->transactionType->id == 2)
                    <x-order-item :tab="$tab" :transaction="$transaction"></x-order-item>
                @elseif ($transaction->transactionType->id == 1 && $transaction->loanDetails->deliveryStatus->is('diterima kembali'))
                    <x-order-item :tab="$tab" :transaction="$transaction"></x-order-item>
                @endif
            @endforeach
        @endif
        <div class="flex justify-between items-center px-5 pt-8 pb-4 gap-5">
            <div class="flex gap-5">
                <h1 class="font-bold">Tanggal pembelian</h1>
                <h1>{{ $groupSale->order_date }}</h1>
            </div>
            <div class="flex flex-col gap-3 items-end">
                <div class="flex">
                    <h1 class="font-bold text-lg mr-5">Total Pembelian</h1>
                    <h1 class="font-bold text-lg">{{ $groupSale->total_with_notation }}</h1>
                </div>
                @if ($groupSale->deliveryStatus->is('dikemas'))
                    <form action="{{ route('update-sale-header', $groupSale) }}" method="POST">
                        @csrf
                        <button type="submit" class="py-3 px-7 rounded-md bg-blue-500 text-white font-medium">
                            {{ $groupSale->deliveryStatus->next_status }}
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
