@extends('layouts.main')

@section('title', 'Cart')

@section('content')
    @if ($cartItems->isEmpty())
        <h1 class="m-64 text-center text-2xl font-semibold">
            Your Cart is Empty!
        </h1>
    @else
        <h1 class="p-2 text-center font-semibold text-2xl">Your Cart</h1>
        <div class="cart-box w-[40%] m-auto  items-container flex flex-col gap-2 justify-center">
            @foreach ($cartItems as $cartItem)
                <div class="items-box mb-2 flex justify-between items-center bg-white rounded-md shadow-md p-3 m-2">
                    <div class="left-content flex gap-5">
                        <img class="h-20 w-20" src="{{ asset('assets/400-days.jpg') }}" alt="">
                        <div class="items-description flex flex-col">
                            <h1 class="font-medium">{{ $cartItem->book->title }} </h1>
                            <h3 class="text-gray-500 text-xs"> {{ $cartItem->book->author }} </h3>

                            <div class="flex flex-row gap-2 py-3">
                                @if ($cartItem->type_id == 1)
                                    <h3
                                        class="bg-zinc-900 border-2 border-zinc-900 text-white rounded-md text-center w-12 px-1">
                                        Loan</h3>
                                @else
                                    <h3
                                        class="bg-zinc-900 border-2 border-zinc-900 text-white rounded-md text-center w-12 px-1">
                                        Sell</h3>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="right-content flex flex-col items-center">
                        @if ($cartItem->type_id == 1)
                            <h3 class="font-medium">{{ $cartItem->book->loan_price_with_notation }}</h3>
                            @php
                                $count['total'] += $cartItem->book->loan_price;
                            @endphp
                        @else
                            <h3 class="font-medium">{{ $cartItem->book->sale_price_with_notation }}</h3>
                            @php
                                $count['total'] += $cartItem->book->sale_price;
                            @endphp
                        @endif
                        <form action="" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $cartItem->id }}">
                            <button type="submit"
                                class="w-10 p-2 mt-1 bg-slate-500 rounded-md text-white text-sm font-center font-medium hover:bg-slate-700">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="total-box border-t-2 border-gray-500 w-[40%] mx-auto mt-10 ">
            <div class="bg-slate-50 shadow-md rounded-md w-[100%] flex justify-between items-center  p-3 mt-5">
                <div class="left-total">
                    <h1 class="font-medium">Total</h1>
                    <h3>{{ $count['counter'] }} book(s)</h3>
                </div>
                <div class="left-total">
                    <h2 class="font-medium">IDR {{ number_format($count['total']) }}</h2>
                </div>
            </div>
        </div>


        <div class="button-checkout w-full pt-10 flex justify-center">
            <button
                class="w-32 p-1 m-2 py-2 bg-[#374151] rounded-md text-white font-center font-medium hover:bg-[#475161] hover:scale-105"
                id="checkout-button">
                CHECKOUT
            </button>
        </div>
    @endif

@endsection
