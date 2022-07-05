@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <div class="container mx-auto w-4/5 mb-[20rem]">
        <h1 class="font-bold text-xl">My Orders</h1>
        <div class="font-medium text-center text-gray-500 border-b border-gray-200 mb-5">
            <ul class="flex flex-wrap -mb-px">
                <li class="mr-2">
                    <a href="#"
                        class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300">
                        On going
                    </a>
                </li>
                <li class="mr-2">
                    <a href="#"
                        class="inline-block p-4 text-blue-600 rounded-t-lg border-b-2 border-blue-600 dark:text-blue-500 dark:border-blue-500"
                        aria-current="page">
                        Finish
                    </a>
                </li>
            </ul>
        </div>
        <div class="flex flex-col gap-4">
            <div class="bg-white rounded-lg p-4 mb-5">
                <div class="divide-y">
                    <div class="flex justify-between items-center py-2 mb-4 px-4">
                        <h1 class="font-bold text-2xl">Fernando clemente</h1>
                        <h1>Dikirim</h1>
                    </div>
                    @include('partials.cart-item')
                    @include('partials.cart-item')
                    <div class="flex px-5 pt-8 pb-4 justify-between">
                        <h1 class="font-bold text-lg">Total Pesanan</h1>
                        <h1 class="font-bold text-lg">IDR 240.000</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
