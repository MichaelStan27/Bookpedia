<div class="bg-slate-50 shadow-md rounded-md w-[100%] flex justify-between items-center p-3">
    <div class="left-total">
        <h1 class="font-medium">Total</h1>
        <h3>{{ $count['counter'] }} book(s)</h3>
    </div>
    <div class="left-total">
        <h2 class="font-medium">{{ $count['total'] }}</h2>
    </div>
</div>

<div>
    <form action="{{ route('checkout') }}" method="post">
        @csrf
        <button type="submit"
            class="w-32 p-1 py-2 bg-[#374151] rounded-md text-white font-center font-medium hover:bg-[#475161] hover:scale-105"
            id="checkout-button">
            CHECKOUT
        </button>
    </form>
</div>
