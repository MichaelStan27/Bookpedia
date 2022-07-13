@props(['groupOrder', 'tab'])

<div class="bg-white rounded-lg p-4 mb-5">
    <div class="divide-y">
        <div class="flex justify-between items-center py-2 mb-4 px-4">
            <h1 class="font-bold text-2xl">{{ $groupOrder->seller->fullname }}</h1>
            <h1 class="px-2 font-bold">{{ $groupOrder->deliveryStatus->info }}</h1>
        </div>
        @if ($tab == 'ongoing')
            @foreach ($groupOrder->detailTransactions as $transaction)
                @if ($groupOrder->deliveryStatus->id < 3)
                    <x-order-item :tab="$tab" :transaction="$transaction"></x-order-item>
                @elseif ($transaction->transactionType->id == 1)
                    <x-order-item :tab="$tab" :transaction="$transaction"></x-order-item>
                @endif
            @endforeach
        @elseif ($tab == 'finish')
            @foreach ($groupOrder->detailTransactions as $transaction)
                @if ($transaction->transactionType->id == 2)
                    <x-order-item :tab="$tab" :transaction="$transaction"></x-order-item>
                @elseif ($transaction->transactionType->id == 1 && $transaction->loanDetails->deliveryStatus->is('diterima kembali'))
                    <x-order-item :tab="$tab" :transaction="$transaction"></x-order-item>
                @endif
            @endforeach
        @endif
        <div class="flex justify-between items-center px-5 pt-8 pb-4 gap-5">
            <div class="flex gap-5">
                <h1 class="font-bold">Tanggal pemesanan</h1>
                <h1>{{ $groupOrder->order_date }}</h1>
            </div>
            <div class="flex flex-col gap-3 items-end">
                <div class="flex">
                    <h1 class="font-bold text-lg mr-5">Total Pesanan</h1>
                    <h1 class="font-bold text-lg">{{ $groupOrder->total_with_notation }}</h1>
                </div>
                @if ($groupOrder->deliveryStatus->is('dikirim'))
                    <form action="{{ route('update-sale-header', $groupOrder) }}" method="POST">
                        @csrf
                        <button type="submit" class="py-3 px-7 rounded-md bg-blue-500 text-white font-medium">
                            {{ $groupOrder->deliveryStatus->next_status }}
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
