<nav class="bg-white py-5 px-28 md:px-48 font-bold mb-4 shadow-md flex justify-between text-lg items-center">
    <ul class="flex">
        <li class="text-2xl"><a href="/"><img src="{{ asset('assets/logo/logo.png') }}" alt=""
                    class="h-20"></a></li>
    </ul>

    <ul class="flex items-center gap-10">
        <li>
            @include('partials.searchbar')
        </li>
        @auth
            <li class="relative">
                <a href="{{ route('cart') }}">
                    <i class="fa-solid fa-cart-shopping fa-lg "></i>
                </a>
                <div class="flex items-center justify-center aspect-square w-5 text-xs rounded-[50%] bg-red-600 text-white absolute top-[-50%] right-[-50%]"
                    id="cartCount">
                    {{ auth()->user()->cartItems()->count() }}
                </div>
            </li>
            <li>
                <a href="{{ route('orders') }}">
                    <i class="fa-solid fa-bag-shopping fa-xl"></i>
                </a>
            </li>
            <li>
                <a href="{{ route('sales') }}">
                    <i class="fa-solid fa-book fa-xl"></i>
                </a>
            </li>
        @endauth
        @auth
            <li class="group relative">
                <a href="{{ route('profile', auth()->user()) }}" class="inline">
                    <i class="fa-solid fa-user fa-lg mx-2"></i>
                    <span class="hidden md:inline">{{ auth()->user()->first_name }}</span>
                </a>
                <div class="w-fit pt-5 hidden absolute z-20 right-0 md:translate-x-1/2 group-hover:block">
                    <div
                        class="p-5 w-72 bg-white shadow-md rounded-lg ring-2 ring-gray-800 ring-offset-4 ring-offset-gray-200 ">
                        <div class="p-3 border-b-2 border-gray-300 flex items-center">
                            <i class="fa-solid fa-user fa-2xl mx-2"></i>
                            <div class="px-3">
                                <h3 class="leading-4">{{ auth()->user()->full_name }}</h3>
                                <a href="{{ route('profile', auth()->user()) }}"
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
                                <a href="{{ route('profile', auth()->user()) . '#wishlist' }}" class="relative">
                                    <button
                                        class="w-20 px-3 my-1 font-semibold shadow-md rounded-md bg-blue-600 text-sm text-white hover:brightness-105">Wishlist
                                    </button>
                                    <div
                                        class="flex items-center justify-center aspect-square w-5 text-xs rounded-[50%] bg-red-600 text-white absolute top-[-35%] right-[-10%]">
                                        {{ auth()->user()->wishlists()->count() }}</div>
                                </a>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button
                                        class="w-20 px-3 my-1 font-semibold shadow-md rounded-md bg-red-600 text-sm text-white whitespace-nowrap hover:brightness-105">Log
                                        Out</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        @else
            <li><a href="{{ route('login') }}">Login</a></li>
        @endauth
    </ul>

</nav>
