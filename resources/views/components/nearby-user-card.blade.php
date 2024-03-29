@props(['user'])

<div class="md:w-[20%] bg-white rounded-lg shadow-xl">
    <div class="h-full rounded-lg overflow-hidden">
        <div class="w-full">
            <div class="w-full flex p-2">
                <div class="p-2">
                    <img src="https://cdn.iconscout.com/icon/free/png-256/profile-417-1163876.png" alt="author"
                        class="w-10 rounded-full overflow-hidden" />
                </div>
                <div class="pl-2 pt-2">
                    <p class="font-bold">{{ Str::limit($user->fullname, 18, $end = '...') }}</p>
                    <p class="text-xs">{{ $user->city->city_name }}</p>
                </div>
            </div>
        </div>

        <div class="p-4">
            <h2 class="tracking-widest text-xs title-font font-bold text-green-400 mb-1 uppercase ">
                {{ $user->phone_number }}
            </h2>
            <h1 class="title-font font-medium text-gray-900 mb-3">{{ $user->successful_trans }}</h1>
            <div class="text-right">
                <a href="{{ route('profile', $user) }}">
                    <button type="button"
                        class="inline-block px-3 py-1 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out">
                        Detail
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
