<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Carts;
use App\Models\carts_items;
use App\Models\commodities;
use App\Models\orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use ECPay_PaymentMethod as ECPayMethod;
use ECPay_AllInOne as ECPay;

class OrderController extends Controller
{
    public function index()
    {
        $orders = orders::where('email', Auth::user()->email)->get();
        
        return view('buycar.allorders', compact('orders'));
    }
    public function new()
    {
        $cart = session()->has('cart') ? session()->get('cart') : null;
        $items = $cart->cartitems;

        $total = 0;
        foreach ($items as $item) {
            $Cprice = DB::table('commodities')->where('id', $item->product_id)->first();
            $qty = DB::table('carts_items')->where('carts_id', $cart->id)->where('product_id', $item->product_id)->first();
            $total += ($qty->qty)*($Cprice->price);
        }

        return view('buycar.ordershow', ['items' => $items, 'total' => $total]);
    }

    public function store()
    {
        
        $cart = session()->get('cart');
        $uuid_temp = str_replace("-", "",substr(Str::uuid()->toString(), 0,18));
        $order = orders::create([
            'name' => request('name'),
            'email' => request('email'),
            'cart' => serialize($cart),
            'tolprice' => request('tolprice'),
            'uuid' => $uuid_temp
            ]);
        // session()->flash('success', 'Order success!');
        try {
            $obj=new \ECPay_AllInOne();
          
            //服務參數
            $obj->ServiceURL  = "https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5";   //服務位置
            $obj->HashKey     = '5294y06JbISpM5x9' ;                                           //測試用Hashkey，請自行帶入ECPay提供的HashKey
            $obj->HashIV      = 'v77hoKGq4kWxNNIS' ;                                           //測試用HashIV，請自行帶入ECPay提供的HashIV
            $obj->MerchantID  = '2000132';                                                     //測試用MerchantID，請自行帶入ECPay提供的MerchantID
            $obj->EncryptType = '1';                                                           //CheckMacValue加密類型，請固定填入1，使用SHA256加密
            //基本參數(請依系統規劃自行調整)
            $MerchantTradeNo = $uuid_temp ;
            $obj->Send['ReturnURL']         = "https://c3f3d65e9a5a.ngrok.io/callback" ;    //付款完成通知回傳的網址
            $obj->Send['PeriodReturnURL']         = "https://c3f3d65e9a5a.ngrok.io/callback" ;    //付款完成通知回傳的網址
            $obj->Send['ClientBackURL'] = "https://c3f3d65e9a5a.ngrok.io/success" ;    //付款完成通知回傳的網址
            $obj->Send['MerchantTradeNo']   = $MerchantTradeNo;                          //訂單編號
            $obj->Send['MerchantTradeDate'] = date('Y/m/d H:i:s');                       //交易時間
            $obj->Send['TotalAmount']       = request('tolprice');                    //交易金額
            $obj->Send['TradeDesc']         = "good to drink" ;                          //交易描述
            $obj->Send['ChoosePayment']     = ECPayMethod::Credit ;              //付款方式:Credit
            $obj->Send['IgnorePayment']     = ECPayMethod::GooglePay ;           //不使用付款方式:GooglePay
            //訂單的商品資料
            array_push($obj->Send['Items'], array('Name' => request('name'), 'Price' => request('tolprice'),
            'Currency' => "元", 'Quantity' => (int) "1", 'URL' => "dedwed"));
            session()->forget('cart');
            $obj->CheckOut();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        //4311-9522-2222-2222 測試用信用卡
        //222                 測試安全碼
    }

    public function callback()
    {
        $data = DB::table('orders')
              ->where('uuid', 'a992a645117e4ffa')
              ->update([
                'paid' => '1',
            ]); 
        return redirect('http://127.0.0.1:8000/');
    }
 
    public function redirectFromECpay () {
        $data = DB::table('orders')
              ->where('uuid', 'a992a645117e4ffa')
              ->update([
                'paid' => '1',
            ]); 
        session()->flash('success', 'Order success!');
        return redirect('http://127.0.0.1:8000/allorder');
    }

    public function orderdetail()
    {
        $cartid =  request('cartid');
        $cart = Carts::where('id', $cartid)->first();

        if (!$cart) {
            $cart = new Carts();
            $cart->user_id = Auth::user()->id;
            $cart->state ='1';
            $cart->save();
        }
        if (count($cart->cartitems) > 0) {
            Session::put('cart', $cart);
        }
        else{
            Session::forget('cart');
        }
        $items = $cart->cartitems;
        
        $total = 0;
        foreach ($items as $item) {
            $Cprice = DB::table('commodities')->where('id', $item->product_id)->first();
            $qty = DB::table('carts_items')->where('carts_id', $cart->id)->where('product_id', $item->product_id)->first();
            $total += ($qty->qty)*($Cprice->price);
        }

        return view('buycar.orderdetail', ['items' => $items, 'total' => $total]);
    }

}
