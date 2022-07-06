<div class="bg-white rounded-lg p-4 mb-5">
    <div class="divide-y">
        <div class="flex justify-between items-center py-2 mb-4 px-4">
            <h1 class="font-bold text-2xl">Fernando clemente</h1>
            <div class="flex divide-x-2">
                <h1 class="px-2">Sedang dibawa kurir untuk dibuang kesungai</h1>
                <h1 class="px-2 font-bold">Dikirim</h1>
            </div>
        </div>
        @foreach ([1, 2] as $item)
            <x-order-item></x-order-item>
        @endforeach
        <div class="flex px-5 pt-8 pb-4 justify-between">
            <h1 class="font-bold text-lg">Total Pesanan</h1>
            <h1 class="font-bold text-lg">IDR 240.000</h1>
        </div>
    </div>
</div>
