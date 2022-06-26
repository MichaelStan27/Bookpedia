    @foreach ($cartItems as $cartItem)
        <x-cart-entry :cartItem="$cartItem"></x-cart-entry>
    @endforeach
