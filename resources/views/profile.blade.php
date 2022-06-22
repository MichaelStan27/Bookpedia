@extends('layouts.main')

@section('title', 'Profile')

@section('content')
    <div class="container mx-auto py-5">

        {{-- Profile Section --}}
        <div class="container py-1">
            <div class="bg-white flex justify-start items-center rounded-l-3xl rounded-r-3xl mt-4 mb-4 w-full">
                <div class="w-1/4 mx-10 py-4 text-center">
                    <img src="https://mdbcdn.b-cdn.net/img/new/avatars/8.webp" class="rounded-full my-4 mx-auto w-5/6"
                        alt="">
                    <h5 class="text-2xl font-bold leading-tight mb-2 text-center">Bima Sakti Agustian</h5>
                </div>
                <div class="mx-5">
                    <div class="my-4 py-2">
                        <div class="flex items-center justify-start">
                            <img src="https://cdn-icons-png.flaticon.com/512/546/546394.png" alt=""
                                class="w-8 h-8 mx-2">
                            <label for="membersice" class="block text-xl text-left text-gray-500"><a
                                    href="mailto:johnmayer@gmail.com" class="text-decoration-none">johnmayer@gmail.com</a>
                        </div>
                    </div>
                    <div class="my-4 py-2">
                        <div class="flex items-center justify-start">
                            <img src="https://cdn-icons.flaticon.com/png/512/1144/premium/1144760.png?token=exp=1655863582~hmac=13d86b398c483639ff3653f990ef24b0"
                                alt="" class="w-8 h-8 mx-2">
                            <label for="membersice" class="block text-xl text-left text-gray-500">Member since
                                <b>24 Mei 2022</b>
                        </div>
                    </div>
                    <div class="my-4 py-2">
                        <div class="flex items-center justify-start">
                            <img src="https://cdn-icons-png.flaticon.com/512/535/535239.png" alt=""
                                class="w-8 h-8 mx-2">
                            <label for="location" class="text-left text-xl text-gray-500">Jakarta Selatan</b>
                        </div>
                    </div>
                    <div class="my-4 py-2">
                        <div class="flex items-center justify-start">
                            <img src="https://cdn-icons-png.flaticon.com/512/6506/6506327.png" alt=""
                                class="w-8 h-8 mx-2">
                            <h5 class="text-xl leading-tight">Rp 12.000</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- MyBook Section --}}
        <hr class="mt-2 mb-2">
        <div class="flex flex-wrap justify-between items-center">
            <div class="text-2xl font-bold">MY BOOK</div>
            <button type="button"
                class="inline-block px-6 py-3 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out">Add
                Book</button>
        </div>

        <div class="container px-2 py-6 h-full">
            <div class="bg-white flex justify-center rounded-l-3xl rounded-r-3xl">
                <div class="p-5">
                    <!--Card Start-->
                    <div class="flex flex-wrap justify-start gap-10 px-2.5">
                        <div
                            class="flex flex-col md:flex-row md:max-w-xl rounded-lg bg-white shadow-xl outline outline-cyan-700">
                            <img class="w-full h-96 md:h-auto object-cover md:w-48 rounded-t-lg md:rounded-none md:rounded-l-lg"
                                src="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/action-thriller-book-cover-design-template-3675ae3e3ac7ee095fc793ab61b812cc_screen.jpg?ts=1637008457"
                                alt="" />
                            <div class="flex flex-col justify-between">
                                <div class="p-6 flex flex-col justify-start">
                                    <h5 class="text-gray-900 text-xl font-medium">Book title</h5>
                                    <h5 class="text-xs mb-4">Book Category</h5>
                                    <h2 class="tracking-widest text-md title-font font-bold text-black-400 mb-4">Rp 10.000
                                    </h2>
                                    <h2 class="tracking-widest text-xs text-grey-400 uppercase">Rent & Sell</h2>
                                    <h2 class="tracking-widest text-xs title-font font-bold text-green-400 mb-4 uppercase">
                                        Available</h2>
                                </div>
                                <div class=" p-3 flex flex-row justify-around">
                                    <button type="button"
                                        class="inline-block px-4 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Edit</button>
                                    <button type="button"
                                        class="inline-block px-4 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">Delete</button>
                                </div>
                                <div class="p-6 flex flex-col justify-start">
                                    <p class="text-gray-600 text-xs">Last updated 3 mins ago</p>
                                </div>
                            </div>
                        </div>

                        <div
                            class="flex flex-col md:flex-row md:max-w-xl rounded-lg bg-white shadow-xl outline outline-cyan-700">
                            <img class="w-full h-96 md:h-auto object-cover md:w-48 rounded-t-lg md:rounded-none md:rounded-l-lg"
                                src="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/action-thriller-book-cover-design-template-3675ae3e3ac7ee095fc793ab61b812cc_screen.jpg?ts=1637008457"
                                alt="" />
                            <div class="flex flex-col justify-between">
                                <div class="p-6 flex flex-col justify-start">
                                    <h5 class="text-gray-900 text-xl font-medium">Book title</h5>
                                    <h5 class="text-xs mb-4">Book Category</h5>
                                    <h2 class="tracking-widest text-md title-font font-bold text-black-400 mb-4">Rp 10.000
                                    </h2>
                                    <h2 class="tracking-widest text-xs text-grey-400 uppercase">Rent & Sell</h2>
                                    <h2 class="tracking-widest text-xs title-font font-bold text-green-400 mb-4 uppercase">
                                        Available</h2>
                                </div>
                                <div class=" p-3 flex flex-row justify-around">
                                    <button type="button"
                                        class="inline-block px-4 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Edit</button>
                                    <button type="button"
                                        class="inline-block px-4 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">Delete</button>
                                </div>
                                <div class="p-6 flex flex-col justify-start">
                                    <p class="text-gray-600 text-xs">Last updated 3 mins ago</p>
                                </div>
                            </div>
                        </div>

                        <div
                            class="flex flex-col md:flex-row md:max-w-xl rounded-lg bg-white shadow-xl outline outline-cyan-700">
                            <img class="w-full h-96 md:h-auto object-cover md:w-48 rounded-t-lg md:rounded-none md:rounded-l-lg"
                                src="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/action-thriller-book-cover-design-template-3675ae3e3ac7ee095fc793ab61b812cc_screen.jpg?ts=1637008457"
                                alt="" />
                            <div class="flex flex-col justify-between">
                                <div class="p-6 flex flex-col justify-start">
                                    <h5 class="text-gray-900 text-xl font-medium">Book title</h5>
                                    <h5 class="text-xs mb-4">Book Category</h5>
                                    <h2 class="tracking-widest text-md title-font font-bold text-black-400 mb-4">Rp 10.000
                                    </h2>
                                    <h2 class="tracking-widest text-xs text-grey-400 uppercase">Rent & Sell</h2>
                                    <h2 class="tracking-widest text-xs title-font font-bold text-green-400 mb-4 uppercase">
                                        Available</h2>
                                </div>
                                <div class=" p-3 flex flex-row justify-around">
                                    <button type="button"
                                        class="inline-block px-4 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Edit</button>
                                    <button type="button"
                                        class="inline-block px-4 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">Delete</button>
                                </div>
                                <div class="p-6 flex flex-col justify-start">
                                    <p class="text-gray-600 text-xs">Last updated 3 mins ago</p>
                                </div>
                            </div>
                        </div>

                        <div
                            class="flex flex-col md:flex-row md:max-w-xl rounded-lg bg-white shadow-xl outline outline-cyan-700">
                            <img class="w-full h-96 md:h-auto object-cover md:w-48 rounded-t-lg md:rounded-none md:rounded-l-lg"
                                src="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/action-thriller-book-cover-design-template-3675ae3e3ac7ee095fc793ab61b812cc_screen.jpg?ts=1637008457"
                                alt="" />
                            <div class="flex flex-col justify-between">
                                <div class="p-6 flex flex-col justify-start">
                                    <h5 class="text-gray-900 text-xl font-medium">Book title</h5>
                                    <h5 class="text-xs mb-4">Book Category</h5>
                                    <h2 class="tracking-widest text-md title-font font-bold text-black-400 mb-4">Rp 10.000
                                    </h2>
                                    <h2 class="tracking-widest text-xs text-grey-400 uppercase">Rent & Sell</h2>
                                    <h2 class="tracking-widest text-xs title-font font-bold text-green-400 mb-4 uppercase">
                                        Available</h2>
                                </div>
                                <div class=" p-3 flex flex-row justify-around">
                                    <button type="button"
                                        class="inline-block px-4 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Edit</button>
                                    <button type="button"
                                        class="inline-block px-4 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">Delete</button>
                                </div>
                                <div class="p-6 flex flex-col justify-start">
                                    <p class="text-gray-600 text-xs">Last updated 3 mins ago</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    {{-- Card End --}}

                    {{-- Pagination --}}
                    <div class="mt-6 flex justify-end">
                        <nav aria-label="Page navigation example">
                            <ul class="flex list-style-none">
                                <li class="page-item"><a
                                        class="page-link relative block py-1.5 px-3 border-0 bg-transparent outline-none transition-all duration-300 rounded-full text-gray-800 hover:text-gray-800 hover:bg-gray-200 focus:shadow-none"
                                        href="#" tabindex="-1">Previous</a></li>
                                <li class="page-item active"><a
                                        class="page-link relative block py-1.5 px-3 border-0 bg-blue-600 outline-none transition-all duration-300 rounded-full text-white hover:text-white hover:bg-blue-600 shadow-md focus:shadow-md"
                                        href="#">1</a></li>
                                <li class="page-item"><a
                                        class="page-link relative block py-1.5 px-3 border-0 bg-transparent outline-none transition-all duration-300 rounded-full text-gray-800 hover:text-gray-800 hover:bg-gray-200 focus:shadow-none"
                                        href="#">2 <span class="visually-hidden"></span></a></li>
                                <li class="page-item"><a
                                        class="page-link relative block py-1.5 px-3 border-0 bg-transparent outline-none transition-all duration-300 rounded-full text-gray-800 hover:text-gray-800 hover:bg-gray-200 focus:shadow-none"
                                        href="#">3</a></li>
                                <li class="page-item"><a
                                        class="page-link relative block py-1.5 px-3 border-0 bg-transparent outline-none transition-all duration-300 rounded-full text-gray-800 hover:text-gray-800 hover:bg-gray-200 focus:shadow-none"
                                        href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        {{-- MY WISHLIST SECTION --}}
        <hr class="mt-2 mb-6">
        <div class="flex flex-wrap justify-between items-center">
            <div class="text-2xl font-bold">MY WISHLIST</div>
            <a href="/" class="text-green-800  md:mb-2 lg:mb-0">
                <p class="inline-flex items-center">More Wishlist
                    <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"></path>
                        <path d="M12 5l7 7-7 7"></path>
                    </svg>
                </p>
            </a>
        </div>

        {{-- Wishlist Data --}}
        <div class="container py-4">
            <section class="text-gray-1000 body-font">
                <div class="container px-5 py-5 mx-auto h-1/4">
                    <div class="flex flex-wrap -m-4 gap-20">

                        <!--start here-->
                        <div class="md:w-[20%] bg-white  rounded-3xl shadow-xl">
                            <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                                <div class="w-full">
                                    <div class="w-full flex p-2">
                                        <div class="p-2">
                                            <img src="https://cdn.iconscout.com/icon/free/png-256/profile-417-1163876.png"
                                                alt="author" class="w-10 rounded-full overflow-hidden" />
                                        </div>
                                        <div class="pl-2 pt-2">
                                            <p class="font-bold">User Name</p>
                                            <p class="text-xs">Book Category</p>
                                        </div>
                                    </div>
                                </div>

                                <img class="w-full object-cover object-center"
                                    src="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/action-thriller-book-cover-design-template-3675ae3e3ac7ee095fc793ab61b812cc_screen.jpg?ts=1637008457"
                                    alt="Book Cover" />

                                <div class="p-4">
                                    <h2
                                        class="tracking-widest text-xs title-font font-bold text-green-400 mb-1 uppercase ">
                                        Price</h2>
                                    <h1 class="title-font text-lg font-medium text-gray-900 mb-3">Book Title</h1>
                                    <div class="flex justify-between items-center flex-wrap ">
                                        <a href="/" class="text-green-800  md:mb-2 lg:mb-0">
                                            <p class="inline-flex items-center">Detail
                                                <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="2" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path d="M5 12h14"></path>
                                                    <path d="M12 5l7 7-7 7"></path>
                                                </svg>
                                            </p>
                                        </a>
                                        <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                                            <button type="button"
                                                class="inline-block px-3 py-1 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out">
                                                Add to Cart
                                            </button>

                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="md:w-[20%] bg-white  rounded-3xl shadow-xl">
                            <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                                <div class="w-full">
                                    <div class="w-full flex p-2">
                                        <div class="p-2">
                                            <img src="https://cdn.iconscout.com/icon/free/png-256/profile-417-1163876.png"
                                                alt="author" class="w-10 rounded-full overflow-hidden" />
                                        </div>
                                        <div class="pl-2 pt-2">
                                            <p class="font-bold">User Name</p>
                                            <p class="text-xs">Book Category</p>
                                        </div>
                                    </div>
                                </div>

                                <img class="w-full object-cover object-center"
                                    src="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/action-thriller-book-cover-design-template-3675ae3e3ac7ee095fc793ab61b812cc_screen.jpg?ts=1637008457"
                                    alt="Book Cover" />

                                <div class="p-4">
                                    <h2
                                        class="tracking-widest text-xs title-font font-bold text-green-400 mb-1 uppercase ">
                                        Price</h2>
                                    <h1 class="title-font text-lg font-medium text-gray-900 mb-3">Book Title</h1>
                                    <div class="flex justify-between items-center flex-wrap ">
                                        <a href="/" class="text-green-800  md:mb-2 lg:mb-0">
                                            <p class="inline-flex items-center">Detail
                                                <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="2" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path d="M5 12h14"></path>
                                                    <path d="M12 5l7 7-7 7"></path>
                                                </svg>
                                            </p>
                                        </a>
                                        <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                                            <button type="button"
                                                class="inline-block px-3 py-1 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out">
                                                Add to Cart
                                            </button>

                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="md:w-[20%] bg-white  rounded-3xl shadow-xl">
                            <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                                <div class="w-full">
                                    <div class="w-full flex p-2">
                                        <div class="p-2">
                                            <img src="https://cdn.iconscout.com/icon/free/png-256/profile-417-1163876.png"
                                                alt="author" class="w-10 rounded-full overflow-hidden" />
                                        </div>
                                        <div class="pl-2 pt-2">
                                            <p class="font-bold">User Name</p>
                                            <p class="text-xs">Book Category</p>
                                        </div>
                                    </div>
                                </div>

                                <img class="w-full object-cover object-center"
                                    src="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/action-thriller-book-cover-design-template-3675ae3e3ac7ee095fc793ab61b812cc_screen.jpg?ts=1637008457"
                                    alt="Book Cover" />

                                <div class="p-4">
                                    <h2
                                        class="tracking-widest text-xs title-font font-bold text-green-400 mb-1 uppercase ">
                                        Price</h2>
                                    <h1 class="title-font text-lg font-medium text-gray-900 mb-3">Book Title</h1>
                                    <div class="flex justify-between items-center flex-wrap ">
                                        <a href="/" class="text-green-800  md:mb-2 lg:mb-0">
                                            <p class="inline-flex items-center">Detail
                                                <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="2" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path d="M5 12h14"></path>
                                                    <path d="M12 5l7 7-7 7"></path>
                                                </svg>
                                            </p>
                                        </a>
                                        <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                                            <button type="button"
                                                class="inline-block px-3 py-1 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out">
                                                Add to Cart
                                            </button>

                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="md:w-[20%] bg-white  rounded-3xl shadow-xl">
                            <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                                <div class="w-full">
                                    <div class="w-full flex p-2">
                                        <div class="p-2">
                                            <img src="https://cdn.iconscout.com/icon/free/png-256/profile-417-1163876.png"
                                                alt="author" class="w-10 rounded-full overflow-hidden" />
                                        </div>
                                        <div class="pl-2 pt-2">
                                            <p class="font-bold">User Name</p>
                                            <p class="text-xs">Book Category</p>
                                        </div>
                                    </div>
                                </div>

                                <img class="w-full object-cover object-center"
                                    src="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/action-thriller-book-cover-design-template-3675ae3e3ac7ee095fc793ab61b812cc_screen.jpg?ts=1637008457"
                                    alt="Book Cover" />

                                <div class="p-4">
                                    <h2
                                        class="tracking-widest text-xs title-font font-bold text-green-400 mb-1 uppercase ">
                                        Price</h2>
                                    <h1 class="title-font text-lg font-medium text-gray-900 mb-3">Book Title</h1>
                                    <div class="flex justify-between items-center flex-wrap ">
                                        <a href="/" class="text-green-800  md:mb-2 lg:mb-0">
                                            <p class="inline-flex items-center">Detail
                                                <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="2" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path d="M5 12h14"></path>
                                                    <path d="M12 5l7 7-7 7"></path>
                                                </svg>
                                            </p>
                                        </a>
                                        <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                                            <button type="button"
                                                class="inline-block px-3 py-1 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out">
                                                Add to Cart
                                            </button>

                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end here -->

                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
