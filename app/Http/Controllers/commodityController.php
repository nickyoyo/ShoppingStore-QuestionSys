<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\commodities;

class commodityController extends Controller
{
    public function Upload(){

        commodities::create([
            'type' => request('type'),
            'name' => request('name'),
            'price' => request('price'),
            'image_path' => request('image'),
            'account' => request('account'),
            'productnum' => request('productnum'),
            'description' => request('description'),
        ]); 

    //    $data = new commodities();
    //    if(request('name')!=null){
    //    $data->type = request('type');
    //    $data->name = request('name');
    //    $data->price = request('price');
    //    $data->image_path = request('image');
    //    $data->account = "111";
    //    $data->productnum = request('productnum');
    //    $data->description = request('description');
       
     //  $data->save();
 
         return redirect('/')->with('mssg' , 'Thanks for record.');
      }
    
    public function create(){
        return view('Commodity.create');
    }
    public function Commodity(){
        $doc = DB::table('commodities')->orderBy('price','desc')->get();
        //$doc = DB::table('commodities')->where('type', 'book')->last();
        //$doc = DB::table('commodities')->lists('name')->all();
        return view('Commodity.Commodity',['test' => $doc]);
    }
    public function deleteC($id){
        $doc = commodities::findorFail($id);
        $doc -> delete();
        return redirect('Commodity');
    }
    public function search(){
        $n = request('name');
        $doc = DB::table('commodities')->where('name','LIKE','%'.$n.'%')->orderBy('price','desc')->get();
        return view('Commodity.Commodity',['test' => $doc]);
    }
    public function showC($id){
        $doc = DB::table('commodities')->where('id',$id)->get();
        return view('Commodity.changeC',['test' => $doc]);
    }
    public function changeC($id){
        $data = DB::table('commodities')
              ->where('id',$id)
              ->update([
                'type' => request('type'),
                'name' => request('name'),
                'price' => request('price'),
                'image_path' => request('image'),
                'account' => request('account'),
                'productnum' => request('productnum'),
                'description' => request('description'),
            ]); 
       // $data->save();
         return redirect('/Commodity');
      }
      public function showAccountProduct($account){
        $doc = DB::table('commodities')->where('account',$account)->orderBy('price','desc')->get();
        return view('Commodity.showC',['test' => $doc]);
      }
      public function searchAccountProduct(){
        $n = request('name');
        $account = request('account');
        $doc = DB::table('commodities')->where('account',$account)->where('name','LIKE','%'.$n.'%')->orderBy('price','desc')->get();
        return view('Commodity.showC',['test' => $doc]);
    }
}
