@props(['transactionItem'])

<div class="flex p-4">
    <div class="h-40 aspect-[1/1.4] bg-neutral-300"></div>
    <div class="ml-5 flex flex-col justify-between">
        <div>
            <h1 class="font-medium text-lg">Naruto</h1>
            <h1 class="text-neutral-500">Author</h1>
        </div>
        <div>
            <h1 class="flex items-end h-full px-2 py-1 font-bold border text-green-400 border-green-500">2
                weeks</h1>
        </div>
    </div>
    <div class="flex flex-col items-end flex-grow justify-between">
        <div>
            <h1 class="font-bold text-lg">
                IDR 120.000
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
