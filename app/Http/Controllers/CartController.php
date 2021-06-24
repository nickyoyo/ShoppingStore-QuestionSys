<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\carts_items;
use App\Models\commodities;
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
        $qty = DB::table('carts_items')->where('product_id', $productId)->first();
        if (!$cart) {
            $cart = new Carts();
            $cart->user_id = Auth::user()->id;
            $cart->save();
        }
        if(!$qty){
            $cartItem = new carts_items();
            $cartItem->qty ='1';
            $cartItem->product_id = $productId;
            $cartItem->cart_id = $cart->id;
            $cartItem->save();
        }
        else{
            $count = $qty->qty;
            $count++;
            $data = DB::table('carts_items')
              ->where('product_id', $productId)
              ->update([
                'qty' => $count,
            ]); 
        }

        return redirect('/Commodity');
    }

    public function showCart()
    {
        $cart = Carts::where('user_id', Auth::user()->id)->first();

        if (!$cart) {
            $cart = new Carts();
            $cart->user_id = Auth::user()->id;
            $cart->save();
        }

        $items = $cart->cartitems;
        
        $total = 0;
        foreach ($items as $item) {
            $Cprice = DB::table('commodities')->where('id', $item->product_id)->first();
            $qty = DB::table('carts_items')->where('product_id', $item->product_id)->first();
            $total += ($qty->qty)*($Cprice->price);
        }
        $Com = commodities::where('id',$item->product_id)->first();
        $items = $Com->commodity;
        return view('buycar.buycar', ['items' => $items, 'total' => $total]);
    }

    public function removeItem($id)
    {
        carts_items::destroy($id);
        return redirect('/Cart');
    }

}