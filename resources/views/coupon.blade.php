@extends('layouts.main')

@section('title', 'Coupon')

@section('content')
    <div class="container mx-auto w-[80%] xl:w-[83%] 4xl:w-[85%] mb-4">
        <h1 class="mt-10 font-semibold text-4xl mb-4">
            Coupon
        </h1>
        <form action="{{ route('redeem') }}" method="post">
            @csrf
            <div class="flex items-center rounded-md bg-white px-8 py-4 justify-between mb-5">
                <div class="w-1/4">
                    <label for="coupon" class="font-semibold text-lg text-black">Redeem
                        Coupon</label>
                </div>
                <div class="flex w-3/4 gap-3">
                    <input type="text" name="coupon" id="coupon" placeholder="Input Coupon Code" autocomplete="off"
                        class="px-3 w-full rounded-md border-2 outline-gray-400 py-1 @error('coupon') border-red-500 @enderror">
                    <button type="submit"
                        class="rounded-md bg-blue-500 hover:brightness-105 px-4 py-2 text-white">Redeem</button>
                </div>
            </div>
        </form>
        <div class="bg-white rounded-md px-8 py-4 items-center">
            <div class="border-b-2 border-neutral-400 pb-6">
                <h1 class="font-bold text-xl mb-4">Your Balance</h1>
                <h2 class="w-fit text-4xl">{{ auth()->user()->balance_with_notation }}
                </h2>
            </div>
            <div class="py-6">
                <h1 class="font-bold text-xl mb-4">Redeem History</h1>
                <div class="divide-y-2 h-[30rem] overflow-y-auto pr-6">
                    @forelse (auth()->user()->couponHistories as $couponHistory)
                        <div class="flex justify-between font-semibold text-lg py-4">
                            <div class="flex gap-10">
                                <h1 class="text-neutral-500">{{ $couponHistory->redeem_date }}</h1>
                                <h1 class="font-bold text-blue-700">{{ $couponHistory->coupon->code }}</h1>
                            </div>
                            <div class="">
                                <span class="bg-slate-700 text-xs mr-2 rounded-md px-2 py-1 text-white ">Amount</span>
                                <span>
                                    {{ $couponHistory->coupon->amount_with_notation }}
                                </span>
                            </div>
                        </div>
                    @empty
                        <h1 class="text-neutral-500 text-lg font-medium">You haven't redeem any coupon yet</h1>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
