<nav class="bg-white py-5 px-28 md:px-48 font-bold mb-4 shadow-md flex justify-between text-lg items-center">
    <ul class="flex">
        <li class="text-2xl"><a href="/">Bookpedia</a></li>
    </ul>

    <ul class="flex items-center gap-10">
        <li>
            @include('partials.searchbar')
        </li>
        <li class="relative">
            @auth
                <a href="{{ route('cart') }}">
                    <i class="fa-solid fa-cart-shopping fa-lg hover:brightness-110"></i>
                </a>
                <div
                    class="aspect-square text-center text-xs  p-1 rounded-[50%] bg-red-600 text-white absolute top-[-50%] right-[-50%]">
                    99</div>
            @endauth
        </li>
        @auth
            <li class="group relative">
                <div class="inline">
                    <i class="fa-solid fa-user fa-lg mx-2"></i>
                    <span class="hidden md:inline">{{ auth()->user()->first_name }}</span>
                </div>
                <div
                    class="p-5 w-72 bg-white shadow-md rounded-lg hidden absolute z-20 right-0 md:translate-x-1/2 group-hover:block">
                    <div class="p-3 border-b-2 border-gray-300 flex items-center">
                        <i class="fa-solid fa-user fa-2xl mx-2"></i>
                        <div class="px-3">
                            <h3 class="leading-3">{{ auth()->user()->full_name }}</h3>
                            <a href="{{ route('profile') }}"
                                class="text-xs text-gray-400 m-0 cursor-pointer hover:brightness-110">>> Tap for
                                detail</a>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="p-3 w-full">
                            <i class="fa-solid fa-wallet fa-sm mr-2 text-green-600"></i>
                            <span class="text-sm">Balance : </span>
                            <h5>{{ auth()->user()->balance_with_notation }}</h5>
                        </div>
                        <div class="p-2 text-right gap-4">
                            <a href="{{ route('cart') }}" class="relative">
                                <button
                                    class="w-16 px-2 my-1 font-semibold shadow-md rounded-md bg-blue-600 text-sm text-white hover:brightness-105">Cart
                                </button>
                                <div
                                    class="aspect-square text-center text-xs p-1 rounded-[50%] bg-red-600 text-white absolute top-[-35%] right-0">
                                    11</div>
                            </a>
                            <form action="/logout" method="post">
                                @csrf
                                <button
                                    class="w-16 px-2 my-1 font-semibold shadow-md rounded-md bg-red-600 text-sm text-white whitespace-nowrap hover:brightness-105">Log
                                    Out</button>
                            </form>
                        </div>
                    </div>

                </div>
            </li>
        @else
            <li><a href="/login">Login</a></li>
        @endauth
    </ul>

</nav>
