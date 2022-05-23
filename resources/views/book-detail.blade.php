@extends('layouts.main')

@section('title', 'Book Detail')

@section('content')
    <div class="container mx-auto flex justify-center mb-4">
        <div class="bg-white shadow-md rounded-md border-2 py-4 w-3/4">
            <div class="flex justify-around w-full gap-5 mx-auto py-2 px-8">
                <img src="{{ asset('assets/books/naruto - vol 1/cover.jpg') }}" alt="" class="w-1/4">
                <div class="w-3/4 p-2 h-full">
                    <div class="flex justify-between">
                        <h1 class="font-bold text-3xl">Book Title</h1>
                        <form action="" method="post">
                            <div class="hover:scale-105">
                                <button type="submit"
                                    class="relative w-[30px] h-[30px] rotate-45 shadow-md bg-gray-300 border-b-2">
                                    <div class="absolute w-full h-full top-0 left-[-50%] rounded-full bg-gray-300">
                                    </div>
                                    <div class="absolute w-full h-full top-[-50%] rounded-full bg-gray-300">
                                    </div>
                                </button>
                            </div>
                        </form>
                    </div>

                    <h2 class="font-medium text-xl text-gray-500 mb-3">Category</h2>
                    <h3 class="rounded-md bg-gray-300 pt-1 px-2 align-text-top text-sm mb-4 h-48">Summary</h3>
                    <div class="grid grid-cols-2 divide-x-2">
                        <div class="text-center">
                            <h1 class="text-md font-medium">Rent</h1>
                            <h2 class="text-sm text-gray-500">Rp 20.000</h2>
                        </div>
                        <div class="text-center">
                            <h1 class="text-md font-medium">Sell</h1>
                            <h2 class="text-sm text-gray-500">Rp 150.000</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mx-auto grid grid-cols-2 divide-x-2 divide-black py-2 px-8 w-full">
                <div class="bg-gray-300 rounded-l-md py-2 px-4">
                    <h1 class="font-bold text-md mb-4">Detail</h1>
                    <table class="text-sm">
                        <tr class="">
                            <td class="font-semibold">Tahun Terbit</td>
                            <td class="">: dd M yyyy</td>
                        </tr>
                        <tr class="">
                            <td class="font-semibold">Penerbit</td>
                            <td class="">: David Beckham</td>
                        </tr>
                        <tr class="">
                            <td class="font-semibold">ISBN</td>
                            <td class="">: ISBN 978-602-8519-93-9</td>
                        </tr>
                        <tr class="">
                            <td class="font-semibold">Author</td>
                            <td class="">: Budi</td>
                        </tr>

                    </table>
                </div>
                <div class="bg-gray-300 rounded-r-md py-2 px-4">
                    <h1 class=" font-bold text-md mb-4">Description</h1>
                    <p class="">Ini tempat teks deskripsi ditaruh</p>
                </div>
            </div>

            <form action="" method="post" class="py-2 px-8 w-full text-center">
                <button type="submit"
                    class="font-medium rounded-md bg-black text-white hover:bg-white hover:text-black px-2 shadow-md border-2 py-1">
                    Add to Cart
                </button>
            </form>
        </div>
    </div>

    <div class="container mx-auto flex justify-center">
        <div class="py-4 w-3/4">
            <h1 class="text-xl font-bold text-gray-500 mb-4">From This User</h1>
            <div class="grid grid-cols-4 gap-4 mb-2">
                <div class="rounded-lg border-2 shadow-md overflow-hidden hover:scale-105">
                    <img src="{{ asset('assets/books/naruto - vol 2/cover.jpg') }}" alt="">
                    <div class="p-2">
                        <h1 class="font-bold text-xl">Book Title</h1>
                        <p class="font-semibold text-md text-gray-500">Rp. xxx.xxx</p>
                    </div>
                </div>
                <div class="rounded-lg border-2 shadow-md overflow-hidden hover:scale-105">
                    <img src="{{ asset('assets/books/naruto - vol 2/cover.jpg') }}" alt="">
                    <div class="p-2">
                        <h1 class="font-bold text-xl">Book Title</h1>
                        <p class="font-semibold text-md text-gray-500">Rp. xxx.xxx</p>
                    </div>
                </div>
                <div class="rounded-lg border-2 shadow-md overflow-hidden hover:scale-105">
                    <img src="{{ asset('assets/books/naruto - vol 2/cover.jpg') }}" alt="">
                    <div class="p-2">
                        <h1 class="font-bold text-xl">Book Title</h1>
                        <p class="font-semibold text-md text-gray-500">Rp. xxx.xxx</p>
                    </div>
                </div>
                <div class="rounded-lg border-2 shadow-md overflow-hidden hover:scale-105">
                    <img src="{{ asset('assets/books/naruto - vol 2/cover.jpg') }}" alt="">
                    <div class="p-2">
                        <h1 class="font-bold text-xl">Book Title</h1>
                        <p class="font-semibold text-md text-gray-500">Rp. xxx.xxx</p>
                    </div>
                </div>

            </div>
            <div class="text-right">
                <a href="" class="underline text-md text-gray-500 hover:text-gray-700">See More...</a>
            </div>
        </div>
    </div>

    <div class="container mx-auto flex justify-center">
        <div class="py-4 w-3/4">
            <h1 class="text-xl font-bold text-gray-500 mb-4">Related Books</h1>
            <div class="grid grid-cols-4 gap-4 mb-2">
                <div class="rounded-lg border-2 shadow-md overflow-hidden hover:scale-105">
                    <img src="{{ asset('assets/books/naruto - vol 2/cover.jpg') }}" alt="">
                    <div class="p-2">
                        <h1 class="font-bold text-xl">Book Title</h1>
                        <p class="font-semibold text-md text-gray-500">Rp. xxx.xxx</p>
                    </div>
                </div>
                <div class="rounded-lg border-2 shadow-md overflow-hidden hover:scale-105">
                    <img src="{{ asset('assets/books/naruto - vol 2/cover.jpg') }}" alt="">
                    <div class="p-2">
                        <h1 class="font-bold text-xl">Book Title</h1>
                        <p class="font-semibold text-md text-gray-500">Rp. xxx.xxx</p>
                    </div>
                </div>
                <div class="rounded-lg border-2 shadow-md overflow-hidden hover:scale-105">
                    <img src="{{ asset('assets/books/naruto - vol 2/cover.jpg') }}" alt="">
                    <div class="p-2">
                        <h1 class="font-bold text-xl">Book Title</h1>
                        <p class="font-semibold text-md text-gray-500">Rp. xxx.xxx</p>
                    </div>
                </div>
                <div class="rounded-lg border-2 shadow-md overflow-hidden hover:scale-105">
                    <img src="{{ asset('assets/books/naruto - vol 2/cover.jpg') }}" alt="">
                    <div class="p-2">
                        <h1 class="font-bold text-xl">Book Title</h1>
                        <p class="font-semibold text-md text-gray-500">Rp. xxx.xxx</p>
                    </div>
                </div>
            </div>
            <div class="text-right">
                <a href="" class="underline text-md text-gray-500 hover:text-gray-700">See More...</a>
            </div>
        </div>
    </div>
@endsection
