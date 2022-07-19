<footer class="bg-black text-white text-lg text-center px-8 py-8 mt-60">
    <div class="border-b-2 border-slate-500 py-4 flex justify-between text-left">
        <div class="">
            <div class="py-2 w-72">
                <h1 class="text-blue-800 text-5xl font-extrabold">BOOKPEDIA</h1>
                <h2 class="font-semibold mb-4">a website that can simplify book transactions for users</h2>
            </div>
            <div class="font-semibold bg-sky-600 rounded-md px-3 py-1">
                <div class="font-bold">
                    <i class="fa-brands fa-github mr-2"></i>Github
                </div>
                <a href="https://github.com/MichaelStan27/Bookpedia">
                    <h1 class="">
                        https://github.com/MichaelStan27/Bookpedia
                    </h1>
                </a>
            </div>
        </div>
        <div class="">
            <h1 class="font-bold text-3xl text-blue-700 mb-4">Contact Us</h1>
            <ul class="">
                <li class="mb-4">
                    <div class="">
                        <i class="fa-solid fa-envelope mr-2"></i> admin@bookpedia.com
                    </div>
                </li>
                <li class="mb-4">
                    <div class="">
                        <i class="fa-solid fa-phone mr-2"></i> (864) 329-1037
                    </div>
                </li>
                <li class="mb-4">
                    <div class="">
                        <i class="fa-solid fa-building mr-2"></i> 24 English Oak Rd
                        Simpsonville, South Carolina(SC), 29681
                    </div>
                </li>
            </ul>
        </div>
        <div class="">
            <h1 class="font-bold text-3xl text-blue-700 mb-4">Social Media</h1>
            <ul class="font-semibold">
                <li class="mb-4">
                    <a href="https://www.instagram.com/">
                        <div class="hover:scale-105">
                            <i class="fa-brands fa-instagram mr-2"></i>Instagram
                        </div>
                    </a>
                </li>
                <li class="mb-4">
                    <a href="https://www.youtube.com/">
                        <div class="hover:scale-105">
                            <i class="fa-brands fa-youtube mr-2"></i>Youtube
                        </div>
                    </a>
                </li>
                <li class="mb-4">
                    <a href="https://twitter.com/">
                        <div class="hover:scale-105">
                            <i class="fa-brands fa-twitter mr-2"></i>Twitter
                        </div>
                    </a>
                </li>
                <li class="mb-4">
                    <a href="https://www.facebook.com/">
                        <div class="hover:scale-105">
                            <i class="fa-brands fa-facebook mr-2"></i>Facebook
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="py-4 flex justify-between">
        <div class="">
            <a href="/"><img src="{{ asset('assets/logo/logo.png') }}" alt="" class="h-28"></a>
        </div>
        <div class="flex font-bold text-base items-center">
            <h1 class="align-text-bottom">
                &copy Kelompok 4 WP Teori 2022. All rights reserved.
            </h1>
        </div>
        @if (!auth()->user())
            <div class="flex items-center">
                <a href="{{ route('register') }}" class="">
                    <button class="rounded-md shadow-md bg-blue-500 hover:brightness-105 px-4 py-2 font-bold">
                        Register
                    </button>
                </a>
            </div>
        @endif
    </div>
</footer>
