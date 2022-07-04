@props(['book'])

<a href="{{ route('book-detail', $book) }}">
    <div class="rounded-lg border-2 shadow-md overflow-hidden hover:scale-105">
        <img src="{{ asset("assets/$book->image") }}" alt="{{ $book->title }}" class="object-cover h-96 w-full">
        <div class="p-2">
            <h1 class="font-bold text-xl">{{ Str::limit($book->title, 15, $end = '...') }}</h1>
            @switch($book->transaction->id)
                @case(1)
                    <div class="">
                        <p class="font-bold text-md text-gray-600">Loan</p>
                        <p class="font-semibold text-md text-gray-500">{{ $book->loan_price_with_notation }}</p>
                    </div>
                @break

                @case(2)
                    <div class="">
                        <p class="font-bold text-md text-gray-600">Sell</p>
                        <p class="font-semibold text-md text-gray-500">{{ $book->sale_price_with_notation }}</p>
                    </div>
                @break

                @case(3)
                    <div class="grid grid-cols-2">
                        <div class="bottom-0">
                            <p class="font-bold text-md text-gray-600">Loan</p>
                            <p class="font-semibold text-md text-gray-500">{{ $book->loan_price_with_notation }}</p>
                        </div>
                        <div class="bottom-0">
                            <p class="font-bold text-md text-gray-600">Sell</p>
                            <p class="font-semibold text-md text-gray-500">{{ $book->sale_price_with_notation }}</p>
                        </div>
                    </div>
                @break
            @endswitch
        </div>
    </div>
</a>
