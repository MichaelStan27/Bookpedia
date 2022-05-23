<nav class="bg-white py-5 px-64 font-bold mb-4 shadow-md flex justify-between text-lg items-center">
    <ul class="flex">
        <li class="text-2xl"><a href="/">Bookpedia</a></li>
    </ul>

    <ul class="flex items-center gap-10">
        <li>
            @include('partials.searchbar')
        </li>
        @guest
            <li><a href="/login">Login</a></li>
        @endguest
        <li>
            <i class="fa-solid fa-cart-shopping fa-lg"></i>
        </li>
    </ul>

</nav>
