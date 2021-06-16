<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\commodities;
use Illuminate\Support\Facades\Storage;

class commodityController extends Controller
{
    public function Upload(Request $request){

        $name = request('account');
        $imagePath = $request->file('image')->store("uploads/{$name}",'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->resize(300, null, 
        function ($constraint) {
            $constraint->aspectRatio();
        });
        $image->save(public_path("storage/{$imagePath}"), 60);

        $image->save();


        commodities::create([
            'type' => request('type'),
            'name' => request('name'),
            'price' => request('price'),
            'image_path' => $imagePath,
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

    public function changeC(Request $request){

        $id =  request('id');
        $account = request('account');

        $data = DB::table('commodities')
              ->where('id',$id)
              ->update([
                'type' => request('type'),
                'name' => request('name'),
                'price' => request('price'),
                'account' => request('account'),
                'productnum' => request('productnum'),
                'description' => request('description'),
            ]); 
       // $data->save();
        $doc = DB::table('commodities')->where('account',$account)->orderBy('price','desc')->get();
        return view('Commodity.showC',['test' => $doc]);
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

    public function changeImage($id){
        $doc = DB::table('commodities')->where('id',$id)->get();
        return view('Commodity.changeImage',['test' => $doc]);
    }

    public function changeImageupload(Request $request){

        $id =  request('id');
        $account = request('account');

        $image_path =  "public/" .request('old_image');
        if (Storage::exists($image_path)) {
            Storage::delete($image_path);
        } 

        $imagePath = $request->file('image')->store("uploads/{$account}",'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->resize(300, null, 
        function ($constraint) {
            $constraint->aspectRatio();
        });
        $image->save(public_path("storage/{$imagePath}"), 60);

        $image->save();

        $data = DB::table('commodities')
              ->where('id',$id)
              ->update([
                'image_path' => $imagePath,
            ]); 

        $doc = DB::table('commodities')->where('account',$account)->orderBy('price','desc')->get();
        return view('Commodity.showC',['test' => $doc]);
    }
}
