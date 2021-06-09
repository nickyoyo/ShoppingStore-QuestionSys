<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\commodities;

class indexController extends Controller
{
    public function Upload(){

        commodities::create([
            'type' => request('type'),
            'name' => request('name'),
            'price' => request('price'),
            'image_path' => request('image'),
            'account' => "111",
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
        return view('tourism.create');
    }
    public function Medicine(){
        $img = Image::make('https://images.pexels.com/photos/4273439/pexels-photo-4273439.jpeg')->resize(300, 200); // 這邊可以隨便用網路上的image取代
        return $img->response('jpg');
        // $doc = DB::table('commodities')->where('type','Medicine')->orderBy('price','asc')->first();
        // return view('tourism.Medicine');
    }
    public function Camp(){
        $doc = DB::table('commodities')->where('type','Camp')->orderBy('price','asc')->first();
        return view('tourism.Camp');
    }
    public function Book(){
        $doc = DB::table('commodities')->where('type','book')->orderBy('price','desc')->get();
        //$doc = DB::table('commodities')->where('type', 'book')->last();
        //$doc = DB::table('commodities')->lists('name')->all();
        return view('tourism.Book',['test' => $doc]);
    }
    public function deletedata($id){
        $doc = commodities::findorFail($id);
        $doc -> delete();
        return redirect('Book');
    }
    public function search(){
        $n = request('name');
        $doc = DB::table('commodities')->where('name','LIKE','%'.$n.'%')->orderBy('price','desc')->get();
        return view('tourism.Book',['test' => $doc]);
    }
       
}
