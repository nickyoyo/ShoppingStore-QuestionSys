<?php
namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\commodities;
use App\Models\Order;
use App\Models\Item_order;
use Illuminate\Support\Facades\DB;
use Log;

class ShopPage extends Component
{
    public $items;
    public Order $order;

    //組件創建時被呼叫
    public function mount()
    {
        $this->items = commodities::get();
        $order = Order::create(['user_id'=>Auth::user()->id]);
        session(['order'=>$order]);
    }

    //渲染組件視圖
    public function render()
    {
        $doc = DB::table('commodities')->orderBy('price','desc')->get();
        return view('livewire.shop-page',['items' => $doc]);
        // return view('livewire.shop-page');
    }

    //Livewire行動，於前端超連結被點下時呼叫，$id為商品ID
    public function addCart($id)
    {
        $doc = DB::table('commodities')->where('id',$id)->get();
        $doc1 = DB::table('Order')->where('user_id',2)->get();
        $doc2=Item_order::create([
            'order_id' => $doc1->id,
            'item_id' => $id,
            'qty' => 1,
            'desc' => $doc->description,
        ]); 
        // Log::debug('addCart');
        // $order = session()->get('order');
        // $this->order = Order::with('items')->findOrFail($order->id);
        // $item = commodities::findOrFail($id);
        // $order->items()->save($item, ['qty' => 1]);
        // $this->order = Order::with('items')->findOrFail($order->id);
    }
}