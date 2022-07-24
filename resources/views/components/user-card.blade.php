@props(['user', 'transactionCount'])

<a href="{{ route('profile', $user) }}">
    <div class="rounded-md bg-white mb-4 px-4 py-2 mx-3 text-center shadow-md hover:scale-105">
        <i class="fa-solid fa-user block text-5xl my-2"></i>
        <div class="text-xl font-semibold">
            {{ Str::limit($user->fullname, 18, $end = '...') }}
        </div>
        <div class="flex divide-x-2 justify-center items-center">
            <div class="text-neutral-500 px-2 w-1/2">
                {{ $user->city->city_name }}
            </div>
            <div class="text-neutral-500 px-2 w-1/2">
                {{ $user->phone_number }}
            </div>
        </div>
        <div class="border-b-2 mb-4 py-1">
            {{ Str::limit($user->user_address, 45, $end = '...') }}
        </div>
        <div class="text-blue-900 font-semibold">
            {{ $user->book_count }}
        </div>
        <div class="font-semibold text-green-500 text-lg">
            {{ $transactionCount }}
        </div>
    </div>
</a>
