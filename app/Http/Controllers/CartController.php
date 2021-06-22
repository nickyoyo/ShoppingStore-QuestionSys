<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\carts_items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addItem($productId)
    {
        $cart = DB::table('carts')->where('user_id', Auth::user()->id)->first();

        if (!$cart) {
            $cart = new Carts();
            $cart->user_id = Auth::user()->id;
            $cart->save();
        }
        
        $cartItem = new carts_items();
        $cartItem->product_id = $productId;
        $cartItem->cart_id = $cart->id;
        $cartItem->save();

        return redirect('/Cart');
    }

    public function showCart()
    {
        $cart = DB::table('carts')->where('user_id', Auth::user()->id)->first();

        if (!$cart) {
            $cart = new Carts();
            $cart->user_id = Auth::user()->id;
            $cart->save();
        }
        $cart = new Carts();
        $items = $cart->carts_items;
        $total = 0;
        foreach ($items as $item) {
            $total += $item->product->price;
        }

        return view('buycar.buycar', ['items' => $items, 'total' => $total]);
    }

    public function removeItem($id)
    {
        CartItem::destroy($id);
        return view('/cart');
    }

}