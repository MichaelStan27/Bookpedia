<nav class="bg-white py-5 px-28 md:px-48 font-bold mb-4 shadow-md flex justify-between text-lg items-center">
    <ul class="flex">
        <li class="text-2xl"><a href="/"><img src="{{ asset('assets/logo/logo.png') }}" alt=""
                    class="h-20"></a></li>
    </ul>
    <ul class="flex items-center gap-10 w-3/4">
        <li class="w-3/4">
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
        @endauth
        @auth
            <li class="group relative">
                <a href="{{ route('profile', auth()->user()) }}" class="inline">
                    <i class="fa-solid fa-user fa-lg mx-2"></i>
                    <span class="hidden md:inline">{{ auth()->user()->first_name }}</span>
                </a>
                <div
                    class="w-fit pt-5 absolute z-30 right-0 md:translate-x-1/2 -translate-y-1/4 invisible opacity-0 scale-50 group-hover:opacity-100 group-hover:visible group-hover:scale-100 group-hover:translate-y-0 transition-all duration-150">
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
                        <div class="items-center">
                            <div class="p-3 w-full">
                                <i class="fa-solid fa-wallet fa-sm mr-2 text-green-600"></i>
                                <span class="text-sm">Balance : </span>
                                <h5>{{ auth()->user()->balance_with_notation }}</h5>
                            </div>
                            <div class="text-center gap-4">
                                <a href="{{ route('profile', auth()->user()) . '#wishlist' }}" class="relative">
                                    <button
                                        class="w-full px-3 py-1 my-1 font-semibold shadow-md rounded-md bg-blue-600 text-sm text-white hover:bg-blue-500">
                                        <i class="fa-solid fa-heart mr-2"></i>Wishlist
                                        <div
                                            class="flex items-center justify-center aspect-square w-7 text-xs rounded-[50%] bg-red-600 text-white absolute top-[-40%] right-[-5%]">
                                            {{ auth()->user()->wishlists()->count() }}</div>
                                    </button>
                                </a>
                                <a href="{{ route('orders') }}">
                                    <button
                                        class="w-full px-3 py-1 my-1 font-semibold shadow-md rounded-md bg-blue-600 text-sm text-white hover:bg-blue-500">
                                        <i class="fa-solid fa-bag-shopping mr-2"></i>My orders
                                    </button>
                                </a>
                                <a href="{{ route('sales') }}">
                                    <button
                                        class="w-full px-3 py-1 my-1 font-semibold shadow-md rounded-md bg-blue-600 text-sm text-white hover:bg-blue-500">
                                        <i class="fa-solid fa-book mr-2"></i>
                                        <span class="hidden md:inline">My book status</span>
                                    </button>
                                </a>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button
                                        class="w-full px-3 py-1 my-1 font-semibold shadow-md rounded-md bg-red-600 text-sm text-white whitespace-nowrap hover:brightness-105">
                                        <i class="fa-solid fa-arrow-right-from-bracket mr-2"></i>
                                        Log Out</button>
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
