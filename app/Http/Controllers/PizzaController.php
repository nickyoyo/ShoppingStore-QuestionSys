<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tourisms;
use App\Models\commodities;

class PizzaController extends Controller
{
    public function index(){
       
        //$stores = tourism::all();
        //$stores = tourism::orderby('name','desc')->get();
        $stores = tourisms::where('type','a')->get();
        return view('tourism.index',['test' => $stores]);
    
    }
    public function show(){
        $stores = commodities::where('id','1')->get();
        return view('tourism.show',['stores' => $stores]);
    }

    public function create(){
        return view('tourism.create');
    }
    public function store(){

       // dd(request('type'));
    
      $data = new commodities();
      if(request('name')!=null){
      $data->type = request('type');
      $data->name = request('name');
      $data->price = request('price');
      $data->account = "111";
      $data->productnum = request('productnum');
      $data->description = request('description');
      
     // return request('toppings');

      $data->save();

        return redirect('/')->with('mssg' , 'Thanks for record.');
      }
    }

    public function destroy($id){
        $stores = tourisms::findOrFail($id);
        $stores->delete();
        
        return redirect('/show/{{$id}}');
    }
}
