<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $cartItems = CartItem::with('book.user')
            ->join('books', 'cart_items.book_id', '=', 'books.id')
            ->where('cart_items.user_id', auth()->user()->id)->get();

        $count = [
            'counter' => $cartItems->count(),
            'total' => 0
            // 'IDR '.number_format($cartItems->sum('price')),
        ];
        
    //    return dd($count);
            // return view('login');

        return view('cart')
            ->with('cartItems', $cartItems)
            ->with('count', $count);
    }
    // public function store(Request $request){
    //     $game = Game::where('id', $request->id)->first();
    //     $cartItem = CartItem::where('user_id', auth()->user()->id)
    //         ->where('game_id', $game->id)
    //         ->first();
        
    //     if($cartItem){
    //         return redirect(route("cart"))->with('message', 'You already had <b>"'.$game->title.'"</b> in your cart!');
    //     }

    //     $new = new CartItem;
    //     $new->user_id = auth()->user()->id;
    //     $new->game_id = $game->id;
    //     $new->save();

    //     return redirect(route("cart"))->with('message', 'Game <b>"'.$game->title.'"</b> has successfully been added to your cart!');
    // }
    // public function destroy(Request $request){
    //     $cartItem = CartItem::with('game')->where('game_id', $request->id)->first();

    //     $cartItem->delete();
    //     return redirect(route("cart"))->with('message', 'Game <b>"'.$cartItem->game->title.'"</b> has successfully been deleted from your cart!');
    // }
}
