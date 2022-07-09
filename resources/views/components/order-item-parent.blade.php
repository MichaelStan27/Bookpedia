@props(['groupOrder'])

<div class="bg-white rounded-lg p-4 mb-5">
    <div class="divide-y">
        <div class="flex justify-between items-center py-2 mb-4 px-4">
            <h1 class="font-bold text-2xl">{{ $groupOrder->seller->fullname }}</h1>
            <div class="flex divide-x-2">
                <h1 class="px-2">Sedang dibawa kurir untuk dibuang kesungai</h1>
                <h1 class="px-2 font-bold">{{ $groupOrder->deliveryStatus->info }}</h1>
            </div>
        </div>
        @foreach ($groupOrder->detailTransactions as $transaction)
            <x-order-item :transaction="$transaction"></x-order-item>
        @endforeach
        <div class="flex px-5 pt-8 pb-4 justify-between">
            <h1 class="font-bold text-lg">Total Pesanan</h1>
            <h1 class="font-bold text-lg">{{ $groupOrder->total_with_notation }}</h1>
        </div>
    </div>
</div>
