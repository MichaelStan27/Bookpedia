@extends('layouts.main')

@section('title', 'Cart')

@section('content')
    @if ($cartItems->isEmpty())
        <h1 class="m-64 text-center text-2xl font-semibold">
            Your Cart is Empty!
        </h1>
    @else
        <h1 class="p-2 text-center font-semibold text-2xl">Your Cart</h1>
        <div id="cartItemContainer" class="w-[40%] m-auto items-container flex flex-col gap-2 justify-center">
            @include('partials.cart-item-container')
        </div>

        <div id="cartTotalContainer"
            class="w-[40%] m-auto pt-5 flex flex-col gap-5 items-center border-t-2 border-gray-500 mt-5 mb-20">
            @include('partials.cart-total-container')
        </div>
    @endif

    @include('partials.cart-trash-popup')

@endsection
