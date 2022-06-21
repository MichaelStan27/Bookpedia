@props(['book'])

<div class="flex flex-col md:flex-row md:max-w-xl rounded-lg bg-white shadow-xl outline outline-cyan-700">
    <img class="w-full h-96 md:h-auto object-cover md:w-48 rounded-t-lg md:rounded-none md:rounded-l-lg"
        src="{{ asset("assets/{$book->image}") }}" alt="{{ $book->title }}" />
    <div class="flex flex-col justify-between">
        <div class="p-6 flex flex-col justify-start">
            <h5 class="text-gray-900 text-xl font-medium">{{ $book->title }}</h5>
            <h5 class="text-xs mb-4">Book Category</h5>
            <h2 class="tracking-widest text-md title-font font-bold text-black-400 mb-4">
                {{ $book->available_price }}
            </h2>
            <h2 class="tracking-widest text-xs text-grey-400 uppercase">{{ $book->transaction_type_string }}</h2>
            <h2 class="tracking-widest text-xs title-font font-bold text-green-400 mb-4 uppercase">
                {{ $book->status_string }}
            </h2>
        </div>
        <div class="p-3 flex flex-row justify-start gap-3">
            <button type="button"
                class="inline-block px-4 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Edit</button>
            <button type="button"
                class="inline-block px-4 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">Delete</button>
        </div>
        <div class="p-6 flex flex-col justify-start">
            <p class="text-gray-600 text-xs">{{ $book->updated_at->diffForHumans() }}</p>
        </div>
    </div>
</div>
